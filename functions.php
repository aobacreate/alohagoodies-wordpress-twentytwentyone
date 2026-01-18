<?php
/**
 * Aloha Goodies (TT1 Child) functions
 */
add_action( 'wp_enqueue_scripts', function () {

  // 親テーマ Twenty Twenty-One
  wp_enqueue_style(
    'twentytwentyone-style',
    get_template_directory_uri() . '/style.css',
    [],
    wp_get_theme( 'twentytwentyone' )->get( 'Version' )
  );

  // 子テーマ Aloha Goodies（base）
  wp_enqueue_style(
    'alohagoodies-style',
    get_stylesheet_directory_uri() . '/style.css',
    [ 'twentytwentyone-style' ],
    filemtime( get_stylesheet_directory() . '/style.css' )
  );

  // hero
  wp_enqueue_style(
    'alohagoodies-hero',
    get_stylesheet_directory_uri() . '/assets/css/hero.css',
    [ 'alohagoodies-style' ],
    filemtime( get_stylesheet_directory() . '/assets/css/hero.css' )
  );

  // tagline
  wp_enqueue_style(
    'alohagoodies-tagline',
    get_stylesheet_directory_uri() . '/assets/css/tagline.css',
    [ 'alohagoodies-hero' ],
    filemtime( get_stylesheet_directory() . '/assets/css/tagline.css' )
  );

  // categories（base の後）
  wp_enqueue_style(
    'alohagoodies-categories',
    get_stylesheet_directory_uri() . '/assets/css/ag-categories.css',
    [ 'alohagoodies-style' ],
    filemtime( get_stylesheet_directory() . '/assets/css/ag-categories.css' )
  );

  // products（categories の後）
  wp_enqueue_style(
    'alohagoodies-products',
    get_stylesheet_directory_uri() . '/assets/css/ag-products.css',
    [ 'alohagoodies-categories' ],
    filemtime( get_stylesheet_directory() . '/assets/css/ag-products.css' )
  );

  //footer (baseの後)
  wp_enqueue_style(
    'alohagoodies-footer',
    get_stylesheet_directory_uri() . '/assets/css/ag-footer.css',
    [ 'alohagoodies-style' ],
    filemtime( get_stylesheet_directory() . '/assets/css/ag-footer.css' )
  );
}, 20 );

add_action( 'wp_enqueue_scripts', function () {

  if ( is_page( ['accessories', 'interior-goods', 'kitchen-tableware','apparel-fabric'] ) ) {
    wp_enqueue_script(
      'ag-product-overlay',
      get_stylesheet_directory_uri() . '/assets/js/product-overlay.js',
      ['jquery'],
      '1.0',
      true
    );
  }
});

function ag_get_home_text() {
  return [
    'title' => [
      'ハワイの風や空気を感じられる、',
      '小さな雑貨を集めたショップです。',
    ],
    'subtitle' => [
      '毎日の暮らしに、',
      '少しだけ南国のやさしさを。',
    ],
  ];
}

function ag_get_accessories_text() {
  return [
    'title' => ["自然のやさしさを、身につける。"],
    'subtitle' => ["Aloha Goodiesのアクセサリーコレクション"],
  ];
}

function ag_get_interior_text() {
  return [
    'title' => ["自然のぬくもりを、部屋に。"],
    'subtitle' => ["Aloha Goodiesのインテリアコレクション"],
  ];
}

function ag_get_kitchen_text() {
  return [
    'title' => ["島の暮らしを、食卓に。"],
    'subtitle' => ["Aloha Goodiesのキッチン＆テーブルウェア"],
  ];
}

function ag_get_apparel_text() {
  return [
    'title' => ["ハワイの風を、毎日に"],
    'subtitle' => ["Aloha Goodiesのアパレル＆布小物"],
  ];
}

function ag_get_error_text() {
  return [
    'title' => ['ページが見つかりません。'],
    'subtitle' => ['ページは移動したか、存在しないようです。'],
  ];
}

function ag_get_section_text($category) {
  $map = [
    'accessories'       => 'ag_get_accessories_text',
    'interior-goods'    => 'ag_get_interior_text',
    'kitchen-tableware' => 'ag_get_kitchen_text',
    'apparel-fabric'    => 'ag_get_apparel_text',
    'home'              => 'ag_get_home_text',
    'error'             => 'ag_get_error_text',
  ];

  // カテゴリ指定あり
  if ( $category && isset( $map[ $category ] ) ) {
    return call_user_func( $map[ $category ] );
  }

  return [
  'title'    => [],
  'subtitle' => [],
  ];
}


function ag_get_footer_text() {
  return [
    [
      'title' => 'Location',
      'lines' => [
        '123 Example Street',
        'Waikiki, Honolulu',
        '12345',
      ],
    ],
    [
      'title' => 'Hours',
      'lines' => [
        'Monday–Friday',
        '8am–6pm',
      ],
    ],
    [
      'title' => 'Contact',
      'lines' => [
        'hi@example.com',
        '(123)456-7890',
      ],
    ],
  ];
}

function ag_get_categories() {
  $base_uri  = get_stylesheet_directory_uri();
  $base_link = home_url( '/' );

  $categories = [
    [
      'slug'  => 'accessories',
      'title' => 'Accessories',
      'desc'  => '自然素材を使ったハワイアンアクセサリー',
      'image' => $base_uri . '/assets/img/home/cat-accessories.webp',
    ],
    [
      'slug'  => 'interior-goods',
      'title' => 'Interior Goods',
      'desc'  => '自然のぬくもりを感じるインテリア雑貨',
      'image' => $base_uri . '/assets/img/home/cat-interior.webp',
    ],
    [
      'slug'  => 'kitchen-tableware',
      'title' => 'Kitchen & Tableware',
      'desc'  => '島の暮らしを感じるキッチンウェア',
      'image' => $base_uri . '/assets/img/home/cat-kitchen.webp',
    ],
    [
      'slug'  => 'apparel-fabric',
      'title' => 'Apparel & Fabric',
      'desc'  => 'リラックスできるアパレルとファブリック',
      'image' => $base_uri . '/assets/img/home/cat-apparel.webp',
    ],
  ];

  // slug からシンプルにリンクを作る（まずはこれで十分）
  foreach ( $categories as &$cat ) {
    $cat['link'] = $base_link . $cat['slug'] . '/';
  }
  unset( $cat ); // 参照解除

  return $categories;
}

function ag_get_accessories_products() {
  $base_uri = get_stylesheet_directory_uri();

  return [
    [
      'category'    => 'accessories',
      'name'        => 'Plumeria Shell',
      'price'       => 3200,
      'description' => '天然のシェル素材を使った、やさしい光沢のネックレス。プルメリアを思わせる軽やかなデザインで、日常にもリゾートにもなじみます。',
      'image'       => $base_uri . '/assets/img/accessories/ac1.webp',
    ],
    [
      'category'    => 'accessories',
      'name'        => 'Turquoise Tide',
      'price'       => 3800,
      'description' => '海の色を閉じ込めたようなターコイズアクセサリー。シンプルながら存在感があり、コーディネートのアクセントに最適です。',
      'image'       => $base_uri . '/assets/img/accessories/ac2.webp',
    ],
    [
      'category'    => 'accessories',
      'name'        => 'Ocean Star',
      'price'       => 2900,
      'description' => '星型モチーフが印象的な、ナチュラルテイストのアクセサリー。波や空を感じるデザインで、さりげないハワイ感を楽しめます。',
      'image'       => $base_uri . '/assets/img/accessories/ac3.webp',
    ],
    [
      'category'    => 'accessories',
      'name'        => 'Palm Charm',
      'price'       => 3400,
      'description' => 'ヤシの木チャームが揺れる、軽やかなアクセサリー。カジュアルな装いに合わせやすく、毎日使いたくなる一品です。',
      'image'       => $base_uri . '/assets/img/accessories/ac4.webp',
    ],
    [
      'category'    => 'accessories',
      'name'        => 'Island Wood',
      'price'       => 3600,
      'description' => '温もりのあるウッド素材を使用した、自然派アクセサリー。シンプルで落ち着いた雰囲気が、大人のリラックススタイルに合います。',
      'image'       => $base_uri . '/assets/img/accessories/ac5.webp',
    ],
    [
      'category'    => 'accessories',
      'name'        => 'Surf Spirit',
      'price'       => 4200,
      'description' => '波をイメージしたモチーフが特徴のアクセサリー。アクティブで自由なハワイの空気を感じられるデザインです。',
      'image'       => $base_uri . '/assets/img/accessories/ac6.webp',
    ],
  ];
}

function ag_get_interior_products() {
  $base_uri = get_stylesheet_directory_uri();

  return [
    [
      'category'    => 'interior-goods',
      'name'        => 'Island Candle',
      'price'       => 2800,
      'description' => '自然素材の器に包まれた、やさしい灯りのキャンドル。島の夕暮れを思わせる落ち着いた雰囲気を演出します。',
      'image'       => $base_uri . '/assets/img/interior-goods/in1.webp',
    ],
    [
      'category'    => 'interior-goods',
      'name'        => 'Palm Tray',
      'price'       => 3600,
      'description' => '天然素材で編まれたトレイ。キャンドルや小物をまとめて、空間に南国のアクセントを添えます。',
      'image'       => $base_uri . '/assets/img/interior-goods/in2.webp',
    ],
    [
      'category'    => 'interior-goods',
      'name'        => 'Shell Decor',
      'price'       => 2400,
      'description' => 'シェルやウッドを組み合わせたウォールデコレーション。自然の表情がやさしく空間になじみます。',
      'image'       => $base_uri . '/assets/img/interior-goods/in3.webp',
    ],
    [
      'category'    => 'interior-goods',
      'name'        => 'Woven Lamp',
      'price'       => 5200,
      'description' => '手編みのシェードから広がる、あたたかな光。リラックスした時間を演出するテーブルランプです。',
      'image'       => $base_uri . '/assets/img/interior-goods/in4.webp',
    ],
    [
      'category'    => 'interior-goods',
      'name'        => 'Palm Object',
      'price'       => 4100,
      'description' => 'ヤシの木をモチーフにしたウッドオブジェ。棚やサイドボードに置くだけで南国ムードに。',
      'image'       => $base_uri . '/assets/img/interior-goods/in5.webp',
    ],
    [
      'category'    => 'interior-goods',
      'name'        => 'Beach Aroma',
      'price'       => 3000,
      'description' => '海辺を思わせる香りのアロマディフューザー。暮らしに穏やかなリゾート感をプラスします。',
      'image'       => $base_uri . '/assets/img/interior-goods/in6.webp',
    ],
  ];
}

function ag_get_kitchen_products() {
  $base_uri = get_stylesheet_directory_uri();

  return [
    [
      'category'    => 'kitchen-tableware',
      'name'        => 'Palm Mug',
      'price'       => 2600,
      'description' => 'ヤシの葉モチーフをあしらったマグカップ。毎日のコーヒータイムに南国のやさしさを添えます。',
      'image'       => $base_uri . '/assets/img/kitchen-tableware/ki1.webp',
    ],
    [
      'category'    => 'kitchen-tableware',
      'name'        => 'Island Bowl',
      'price'       => 3400,
      'description' => '自然な色合いと曲線が美しいボウル。食卓にもインテリアにもなじむデザインです。',
      'image'       => $base_uri . '/assets/img/kitchen-tableware/ki2.webp',
    ],
    [
      'category'    => 'kitchen-tableware',
      'name'        => 'Palm Plate',
      'price'       => 3000,
      'description' => '南国モチーフを描いたプレート。軽やかなデザインで日常使いに最適です。',
      'image'       => $base_uri . '/assets/img/kitchen-tableware/ki3.webp',
    ],
    [
      'category'    => 'kitchen-tableware',
      'name'        => 'Tea Pot',
      'price'       => 4800,
      'description' => 'やわらかなフォルムのティーポット。ゆったりとした島時間を楽しめます。',
      'image'       => $base_uri . '/assets/img/kitchen-tableware/ki4.webp',
    ],
    [
      'category'    => 'kitchen-tableware',
      'name'        => 'Island Cup',
      'price'       => 2400,
      'description' => '手になじむサイズ感のカップ。シンプルながら温もりのある仕上がりです。',
      'image'       => $base_uri . '/assets/img/kitchen-tableware/ki5.webp',
    ],
    [
      'category'    => 'kitchen-tableware',
      'name'        => 'Palm Cloth',
      'price'       => 2200,
      'description' => 'ヤシ柄をあしらったキッチンクロス。食卓や収納のアクセントにも。',
      'image'       => $base_uri . '/assets/img/kitchen-tableware/ki6.webp',
    ],
  ];
}

function ag_get_apparel_products() {
  $base_uri = get_stylesheet_directory_uri();

  return [
    [
      'category'    => 'apparel-fabric',
      'name'        => 'Island Tote',
      'price'       => 4200,
      'description' => '自然素材を使ったトートバッグ。軽やかで、日常にもリゾートにも使いやすいデザインです。',
      'image'       => $base_uri . '/assets/img/apparel-fabric/ap1.webp',
    ],
    [
      'category'    => 'apparel-fabric',
      'name'        => 'Aloha Dress',
      'price'       => 6800,
      'description' => '南国モチーフをあしらったワンピース。風を感じる、やさしい着心地です。',
      'image'       => $base_uri . '/assets/img/apparel-fabric/ap2.webp',
    ],
    [
      'category'    => 'apparel-fabric',
      'name'        => 'Island Shirt',
      'price'       => 5200,
      'description' => '自然な色合いのアロハシャツ。リラックスした島の雰囲気を楽しめます。',
      'image'       => $base_uri . '/assets/img/apparel-fabric/ap3.webp',
    ],
    [
      'category'    => 'apparel-fabric',
      'name'        => 'Palm Towel',
      'price'       => 3000,
      'description' => '肌ざわりのよいファブリックタオル。ビーチやお部屋で心地よく使えます。',
      'image'       => $base_uri . '/assets/img/apparel-fabric/ap4.webp',
    ],
    [
      'category'    => 'apparel-fabric',
      'name'        => 'Beach Bag',
      'price'       => 4500,
      'description' => 'たっぷり入る布製バッグ。ナチュラルな素材感がコーディネートに映えます。',
      'image'       => $base_uri . '/assets/img/apparel-fabric/ap5.webp',
    ],
    [
      'category'    => 'apparel-fabric',
      'name'        => 'Island Wear',
      'price'       => 5900,
      'description' => '軽やかな素材のリゾートウェア。島の暮らしを感じる一着です。',
      'image'       => $base_uri . '/assets/img/apparel-fabric/ap6.webp',
    ],
  ];
}

function ag_get_items( $category = null ) {
  $map = [
    'accessories'       => 'ag_get_accessories_products',
    'interior-goods'    => 'ag_get_interior_products',
    'kitchen-tableware' => 'ag_get_kitchen_products',
    'apparel-fabric'    => 'ag_get_apparel_products',
  ];

  // カテゴリ指定がない or マップに存在しない → 空配列
  if ( ! $category || ! isset( $map[ $category ] ) ) {
    return [];
  }

  // 正常系：そのカテゴリの商品だけ返す
  return call_user_func( $map[ $category ] );
}

function ag_get_all_items() {

  $categories = [
    'accessories',
    'interior-goods',
    'kitchen-tableware',
    'apparel-fabric',
  ];

  $all_items = [];

  foreach ( $categories as $category ) {
    $items = ag_get_items( $category );

    if ( ! empty( $items ) ) {
      $all_items = array_merge( $all_items, $items );
    }
  }

  return $all_items;
}


