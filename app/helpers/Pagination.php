<?php

class Pagination
{
    public $currenturl;

    public function getpage()
    {


        $this->currenturl = $_SERVER['REQUEST_URI'];

        $querystring = parse_url($this->currenturl);

        $page = explode('=', $querystring['query'])[0];

        return $page;

    }

    public function getparameter()
    {
        $this->currenturl = $_SERVER['REQUEST_URI'];
        $urlparts = parse_url($this->currenturl);
        parse_str($urlparts['query'], $queryparameters);

        // var_dump($queryparameters['letters']);
        return $queryparameters;


    }


    public function pagination($data)
    {





        $currentURL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        $urlparts = parse_url($currentURL);
        parse_str($urlparts['query'], $parameter);

        ?>

        <div class="flex justify-end items-center mt-10 mb-10 space-x-3">
            <?php if ($data['currentPage'] > 1): ?>
                <a
                    href="<?php echo $urlparts['path'] . '?' . http_build_query(array_merge($parameter, ['page' => $data['currentPage'] - 1])); ?>">
                    <span class="border-2 bg-gray-200 hover:bg-gray-300 px-4 py-2">Prev</span>
                </a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                <a href="<?php echo $urlparts['path'] . '?' . http_build_query(array_merge($parameter, ['page' => $i])); ?>">
                    <span class="border px-4 py-2 <?php echo $i == $data['currentPage'] ? 'bg-gray-200' : ''; ?>">
                        <?php echo $i; ?>
                    </span>
                </a>
            <?php endfor; ?>

            <?php if ($data['currentPage'] < $data['totalPages']): ?>
                <a
                    href="<?php echo $urlparts['path'] . '?' . http_build_query(array_merge($parameter, ['page' => $data['currentPage'] + 1])); ?>">
                    <span class="border-2 bg-gray-200 hover:bg-gray-300 px-4 py-2">Next</span>
                </a>
            <?php endif; ?>
        </div>

        <?php
    }

}

?>