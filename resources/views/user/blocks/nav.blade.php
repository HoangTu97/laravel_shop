<div id="categorymenu">
  <nav class="subnav">
    <ul class="nav-pills categorymenu">
      <li><a class="" href={!! url('/') !!}>Accueil</a>
      </li>
      <?php
        $menu_level_1 = DB::table('cates')->where('parent_id', 0)->get();
      ?>
      @foreach($menu_level_1 as $item_level_1)
      <li><a  href="{!! url('loai-san-pham',[$item_level_1->id,$item_level_1->alias]) !!}">{!! $item_level_1->name !!}</a>
        <?php $menu_level_2 = DB::table('cates')->where('parent_id', $item_level_1->id)->get(); ?>
        @if($menu_level_2)
        <div>
          <ul>
            @foreach($menu_level_2 as $item_level_2)
              <li><a href="{!! url('loai-san-pham',[$item_level_2->id,$item_level_2->alias]) !!}">{!! $item_level_2->name !!}</a>
              </li>
            @endforeach
          </ul>
        </div>
        @endif
      </li>
      @endforeach
      <li><a href={!! url('lien-he') !!}>Contact</a>
      </li>
    </ul>
  </nav>
</div>
