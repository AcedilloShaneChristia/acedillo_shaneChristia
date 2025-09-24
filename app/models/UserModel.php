<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    
    protected $table = 'users';
    protected $primary_key = 'id';
    
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Pagination + Search
     */
    public function page($q = '', $records_per_page = null, $page = null) {
        if (is_null($page)) {
            // Return all rows if no pagination
            return [
                'records'    => $this->db->table($this->table)->get_all(),
                'total_rows' => $this->db->table($this->table)->count_all()
            ];
        } else {
            $query = $this->db->table($this->table);

            // If search query is provided
            if (!empty($q)) {
                $query->like('id', $q)
                      ->or_like('username', $q)
                      ->or_like('email', $q);
            }

            // Clone before applying pagination to count total
            $countQuery = clone $query;
            $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

            // Fetch paginated records
            $data['records'] = $query->pagination($records_per_page, $page)
                                     ->get_all();

            return $data;
        }
    }

    /**
     * CRUD helpers
     */
    public function all() {
        return $this->db->table($this->table)->get_all();
    }

    public function find($id) {
        return $this->db->table($this->table)->where($this->primary_key, $id)->get();
    }

    public function insert($data) {
        return $this->db->table($this->table)->insert($data);
    }

    public function update($id, $data) {
        return $this->db->table($this->table)->where($this->primary_key, $id)->update($data);
    }

    public function delete($id) {
        return $this->db->table($this->table)->where($this->primary_key, $id)->delete();
    }
}
