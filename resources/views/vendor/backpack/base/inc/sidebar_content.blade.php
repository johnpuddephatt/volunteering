<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="treeview">
  <a href="#">
    <i class="fa fa-star"></i>
    <span>Opportunities</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
      <li><a href="{{ backpack_url('opportunity') }}"><i class="fa fa-list-ul"></i> <span>Opportunities</span></a></li>
      <li><a href="{{ backpack_url('category') }}"><i class="fa fa-tag"></i> <span>Categories</span></a></li>
      <li><a href="{{ backpack_url('suitability') }}"><i class="fa fa-exchange"></i> <span>Suitabilities</span></a></li>
      <li><a href="{{ backpack_url('accessibility') }}"><i class="fa fa-deaf"></i> <span>Accessibilities</span></a></li>
      <li><a href="{{ backpack_url('location') }}"><i class="fa fa-map"></i> <span>Locations</span></a></li>
  </ul>
</li>

<li><a href="{{ backpack_url('organisation') }}"><i class="fa fa-users"></i> <span>Organisations</span></a></li
