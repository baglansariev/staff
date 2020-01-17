<?php
    namespace App\Http\Controllers\Template\Common;
    use App\Http\Controllers\Controller;
    use App\Models\ColumnLeft as ColumnLeftModel;
    use Illuminate\Support\Facades\Request;

    class ColumnLeft extends Controller
    {
        public function show()
        {
            return view('common/column_left', ['menu' => $this->getMenu()]);
        }

        public function getMenu()
        {
            $menu = ColumnLeftModel::all();

            if ($menu)
            {
                $data = array();
                foreach ($menu as $key => $item) {
                    $data[$key]['id'] = $item['id'];
                    $data[$key]['title'] = $item['title'];
                    $data[$key]['url'] = $item['url'];
                    $data[$key]['icon'] = $item['icon'];
                    $data[$key]['class'] = '';
                    if ( $this->isMenuActive($item['url']) )
                    {
                        $data[$key]['class'] = 'class=active';
                    }
                }
                return $data;
            }
            return false;
        }

        private function isMenuActive($menu_item)
        {
            if (Request::path() == $menu_item)
            {
                return true;
            }
            return false;
        }
    }