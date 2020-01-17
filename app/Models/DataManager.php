<?php
    namespace App\Models;

    interface DataManager
    {
        public function getItem($item_id);
        public function getList();
        public function create();
        public function update();
        public function delete($item_id);
    }