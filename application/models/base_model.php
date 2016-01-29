<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author  Hanmy
 * @data    2016/1/28
 * @since
 */
class Base_model extends CI_Model
{
    protected $table;
    protected $join_table;
    protected $validate = array();

    public function __construct()
    {
        $this->load->database();
        $this->table = strtolower(substr(__CLASS__, -6, 6));
        //join_table格式，array('shop_user'=>array('condition'=>'shop_order.user_id = shop_user.id','join_type'=>'right','fieldStr'=>''));
        $this->join_table = array();
        parent::__construct();
    }

    /**
     * 查找搜索条件
     * @return array
     */
    protected function _search()
    {
        $search_array = $this->get_search_field();
        $field_list = $this->db->list_fields($this->table);
        //查询条件过滤
        $map = array();
        if (!empty($this->join_table)) {
            foreach ($this->join_table as $table => $table_info) {
                $other_fields[$table] = $this->db->list_fields($table);
            }
        }
        if (isset($search_array) && !empty($search_array))
            foreach ($search_array as $key => $value) {
                if (in_array($key, $field_list)) {
                    if (!strstr($key, '.')) $key = $this->table . '.' . $key;
                    $map[$key] = $value;
                }
                else {
                    if (isset($other_fields) && !empty($other_fields))
                        foreach ($other_fields as $table => $fields) {
                            if (in_array($key, $fields)) {
                                if (!strstr($key . '.')) $key = $table . '.' . $key;
                                $map[$key] = $value;
                                continue;
                            }
                        }
                }
            }

        return $map;
    }

    /**
     * 形成CI可识别的查询条件
     * @return array
     */
    private function get_search_field()
    {
        $search_array = array();
        $search_map = array();
        if (!empty($_REQUEST)) $search_array = $_REQUEST;
        if (!empty($search_array))
            foreach ($search_array as $field => $value) {
                if ($value != '') {
                    if (substr($field, 0, 5) == 'like_') {
                        // 查找中以like_ 开头的代表是模糊查询，值以数组的方式，与下面的get_dataList 相对应使用
                        $field = substr($field, 5);
                        $value = array('like', $value);
                    }
                    $search_map[$field] = $value;
                }
            }
        return $search_map;
    }

    public function get_datalist($where = array(), $fieldStr = "*", $limit = '1', $order = array(), $request = true)
    {
        if ($request)
            $where = array_merge($where, $this->_search());
        $select = $fieldStr;
        $this->db->select($select);
        //表名
        $this->db->from($this->table);
        if (!empty($this->join_table)) {
            foreach ($this->join_table as $table => $join_info) {
                $this->db->join($table, $join_info['condition'], $join_info['type']);
            }
            foreach ($where as $key => $value) {
                if (!strstr($key, '.')) {
                    $where[$this->table . '.' . $key] = $value;
                    unset($where[$key]);
                }
            }
        }
        //限制条件
        if ($where && is_array($where)) {
            foreach ($where as $key => $value) {
                if (!is_array($value)) {
                    $this->db->where($key, $value);
                }
                else if (is_array($value)) {
                    //模糊查询格式：%_fieldName = value;
                    switch ($value[0]) {
                        case "in":
                            $this->db->where_in($key, $value[1]);
                            break;
                        default:
                            $this->db->like($key, $value[1], 'both');
                            break;
                    }

                }
            }
        }

        //排序
        if ($order && is_array($order)) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        //条数
        if (is_array($limit)) {
            $this->db->limit($limit[0], $limit[1]);
        }
        else {
            $this->db->limit($limit);
        }
        //查询
        $query = $this->db->get();
        //结果
        $rows = $query->result_array();
        if ($rows) {
            if (is_array($limit) || $limit > 1) {
                return $rows;
            }
            else {
                return $rows[0];
            }
        }
    }

    /**
     * 获取一个数据
     * @param array      $where
     * @param string     $fieldStr
     * @param string     $limit
     * @param array      $order
     * @param bool|false $request
     * @return mixed
     */
    public function get_one_data($where = array(), $fieldStr = "*", $limit = '1', $order = array(), $request = false)
    {
        if ($request)
            $where = array_merge($where, $this->_search());
        $select = $fieldStr;
        $this->db->select($select);
        //表名
        $this->db->from($this->table);
        if (!empty($this->join_table)) {
            foreach ($this->join_table as $table => $join_info) {
                $this->db->join($table, $join_info['condition'], $join_info['type']);
            }
            foreach ($where as $key => $value) {
                if (!strstr($key, '.')) {
                    $where[$this->table . '.' . $key] = $value;
                    unset($where[$key]);
                }
            }
        }
        //限制条件
        if ($where && is_array($where)) {
            foreach ($where as $key => $value) {
                if (!is_array($value)) {
                    $this->db->where($key, $value);
                }
                else if (is_array($value)) {
                    //模糊查询格式：%_fieldName = value;
                    switch ($value[0]) {
                        case "in":
                            $this->db->where_in($key, $value[1]);
                            break;
                        default:
                            $this->db->like($key, $value[1], 'both');
                            break;
                    }

                }
            }
        }

        //排序
        if ($order && is_array($order)) {
            foreach ($order as $key => $value) {
                $this->db->order_by($key, $value);
            }
        }
        //条数
        $this->db->limit(1);
        //查询
        $query = $this->db->get();
        //结果
        $rows = $query->result();
        if ($rows) {
            return $rows[0];
        }
    }

    /**
     * 得到数据总量
     * Enter description here ...
     * @param array $where
     * @param bool  $request true
     * @author han 20140731 edit 获取总量不需要用联表
     */
    public function get_data_count($where = array(), $request = true)
    {
        if ($request) {
            $where = array_merge($where, $this->_search());
        }

        if (!empty($this->join_table)) {
            foreach ($this->join_table as $table => $join_info) {
                $this->db->join($table, $join_info['condition'], $join_info['type']);
            }
            foreach ($where as $key => $value) {
                if (!strstr($key, '.')) {
                    $where[$this->table . '.' . $key] = $value;
                    unset($where[$key]);
                }
            }
        }
        $this->db->from($this->table);
        if ($where && is_array($where)) {
            foreach ($where as $key => $value) {
                if (!is_array($value)) {
                    $this->db->where($key, $value);
                }
                else if (is_array($value)) {
                    //模糊查询格式：%_fieldName = value;
                    switch ($value[0]) {
                        case "in":
                            $this->db->where_in($key, $value[1]);
                            break;
                        default:
                            $this->db->like($key, $value[1], 'both');
                            break;
                    }

                }
            }
        }
        $count = $this->db->count_all_results();

        return $count;

    }

    /**
     * 添加数据
     * @param  $data
     * @param  $insert_id
     */
    protected function add_data($data = array(), $insert_id = TRUE)
    {
        $this->db->insert($this->table, $data);
        if ($insert_id) return $this->db->insert_id();
    }

    protected function update_data($where = '', $set = '')
    {
        //限制条件
        if ($where && is_array($where)) {
            foreach ($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->update($this->table, $set);
        return $this->db->affected_rows();
    }

    protected function remove_data($where = '')
    {
        $this->db->delete($this->table, $where);
    }

    protected function validate_data($data)
    {
        $validate = $this->validate;
        foreach ($validate as $title => $v) {
            $result = $this->validate_one_field($title, $data[$title]);
            if ($result == false) {
                return $v[1];
            }
        }
        return true;
    }

    private function validate_one_field($field, $data)
    {
        $rules = $this->validate;
        if (array_key_exists($field, $rules)) {
            $rule = $rules[$field];
            $field_rules = explode(',', $rule[0]);
            foreach ($field_rules as $value) {
                switch ($value) {
                    case 'required':
                        if (!$data) {
                            return false;
                        }
                        break;

                    default:
                        break;
                }
            }
            return true;
        }
        else return true;
    }

    protected function query($sql)
    {
        $query = $this->db->query($sql);
        //$query = $this->db->get();
        return $query->result();
    }
}

?>