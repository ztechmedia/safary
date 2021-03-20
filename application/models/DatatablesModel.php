<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DatatablesModel extends CI_Model
{
    public function totalDocument($table, $querySelector)
    {
        if ($querySelector) {
            return $this->querySelector($querySelector)->count_all_results();
        } else {
            return $this->db->count_all_results($table);
        }
    }

    public function getAll($table, $limit, $start, $col, $dir, $querySelector)
    {
        if ($querySelector) {
            return $this->querySelector($querySelector)
                ->limit($limit, $start)
                ->order_by($col, $dir)
                ->get()
                ->result();
        } else {
            return $this->db
                ->limit($limit, $start)
                ->order_by($col, $dir)
                ->get($table)
                ->result();
        }
    }

    public function dataSearch($table, $limit, $start, $search, $col, $dir, $searchAble, $querySelector)
    {
        $like = 0;
        $query = $querySelector
        ? $this->querySelector($querySelector)
        : $this->db->select("*")->from($table);

        foreach ($searchAble as $sc) {
            if ($like === 0) {
                $query->like($sc, $search);
            } else {
                $query->or_like($sc, $search);
            }
            $like++;
        }

        return $query->limit($limit, $start)->order_by($col, $dir)->get()->result();
    }

    public function dataSearchCount($table, $search, $searchAble, $querySelector)
    {
        $like = 0;
        $query = $querySelector
        ? $this->querySelector($querySelector)
        : $this->db->select("*")->from($table);

        foreach ($searchAble as $sc) {
            if ($like === 0) {
                $query->like($sc, $search);
            } else {
                $query->or_like($sc, $search);
            }
            $like++;
        }

        return $query->get()->result();
    }

    public function querySelector($type)
    {
        switch ($type) {
            //if table has query selector, it use for join table
        }
    }
}
