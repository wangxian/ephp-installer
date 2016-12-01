<?php

return [
  // 一个路由模块中，可有多个规则，优先匹配第一个规则。
  'test'=> [
    ['|/test/(\d+)|', '/test/test/your_type/$1'],
  ]

  'archives'=> [
    ['|^/archives/(\d+).html$|', '/index/test/your_id/$1.html'],
  ]
];
