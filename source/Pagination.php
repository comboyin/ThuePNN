<?php
namespace entity;

class Pagination

{
    
    // cách sử dụng:
    // tạo ra $_config voi các option
    // rùi gọi hàm init với đối số là $_config
    private $_config = array(
        'current_page' => 1,
        'total_record' => 1, // Tổng số record
        'total_page' => 1, // Tổng số trang
        'limit' => 10, // limit trong sql
        'start' => 0, // start trong sql
        'link_full' => '', // link full co dang nhu sau: domain/com/page/{page}
        'link_first' => '', // link trang dau tien
        'range' => 9, // So button trang hien thi
        'min' => 0, // Tham so min
        'max' => 0
    );

    /**
     *
     * @return the $_config
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     *
     * @param
     *            multitype:number string $_config
     */
    public function setConfig($_config)
    {
        $this->_config = $_config;
    }
    
    // Tham so max, min va max la 2 tham so private  
    function init($config = array())
    {
        foreach ($config as $key => $val) {
            if (isset($this->_config[$key])) {
                $this->_config[$key] = $val;
            }
        }
        
        // kiem tra limit
        if ($this->_config['limit'] < 0) {
            $this->_config['limit'] = 0;
        }
        
        $this->_config['total_page'] = ceil($this->_config['total_record'] / $this->_config['limit']);
        
        // kiem tra total_page
        if (! $this->_config['total_page']) {
            $this->_config['total_page'] = 1;
        }
        
        // kiem tra current_page
        if ($this->_config['current_page'] < 1) {
            $this->_config['curremt_page'] = 1;
        }
        
        if ($this->_config['current_page'] > $this->_config['total_page']) {
            $this->_config['current_page'] = $this->_config['total_page'];
        }
        
        $this->_config['start'] = ($this->_config['current_page'] - 1) * $this->_config['limit'];
        
        $middle = ceil($this->_config['range'] / 2);
        
        if ($this->_config['total_page'] < $this->_config['range']) {
            $this->_config['min'] = 1;
            $this->_config['max'] = $this->_config['total_page'];
        } 

        else {
            $this->_config['min'] = $this->_config['current_page'] - ($middle + 1);
            
            $this->_config['max'] = $this->_config['current_page'] + ($middle - 1);
            
            if ($this->_config['min'] < 1) {
                
                $this->_config['min'] = 1;
                $this->_config['max'] = $this->_config['range'];
            } 

            else 
                if ($this->_config['max'] > $this->_config['total_page']) {
                    $this->_config['max'] = $this->_config['total_page'];
                    $this->_config['min'] = $this->_config['total_page'] - $this->_config['range'] + 1;
                }
        }
    }

    private function __link($numPage)
    {
        if ($numPage <= 1 && $this->_config['link_first']) {
            return $this->_config['link_first'];
        }
        
        return str_replace('{page}', $numPage, $this->_config['link_full']);
    }
    
    // show pagination bootstrap
    public function html()
    {
        $html = '';
        if ($this->_config['total_record'] > $this->_config['limit']) {
            $html .= '<nav';
            $html .= '<ul class="pagination">';
            // nut back
            if ($this->_config['current_page'] > 1) {
                $html .= '<li>';
                $html .= '<a href="' . $this->__link($this->_config['current_page'] - 1) . '" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>';
                $html .= '</li>';
            }
            
            // trang
            for ($i = $this->_config['min']; $i <= $this->_config['max']; $i ++) {
                
                if ($this->_config['current_page'] == $i) {
                    $html .= '<li class="active">';
                } else {
                    $html .= '<li>';
                }
                
                $html .= '<a href="' . $this->__link($i) . '">' . $i . '</a>';
                
                $html .= '</li>';
            }
            
            // nut next
            if ($this->_config['current_page'] != $this->_config['total_page']) {
                $html .= '<li>';
                $html .= '<a href="' . $this->__link($this->_config['current_page'] + 1) . '" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>';
                $html .= '</li>';
            }
            $html .= '</ul>';
            $html .= '</nav>';
        }
        
        return $html;
    }
}

