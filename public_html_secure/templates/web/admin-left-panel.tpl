<ul class="sidebar-menu">
  <li {if $smarty.server.REQUEST_URI eq '/admin-dashboard'}class="active"{/if}>
    <a class="" href="/admin-dashboard">
        <span>Dashboard</span>
    </a>
  </li>
  <li {if $smarty.server.REQUEST_URI eq '/admin-add-apartment'}class="active"{/if}>
    <a class="" href="/admin-add-apartment">
        <!--<i class="icon_documents_alt"></i>-->
        <span>Add Apartment</span>
    </a>
  </li>
  <li {if $smarty.server.REQUEST_URI eq '/admin-add-corporate'}class="active"{/if}>
    <a class="" href="/admin-add-corporate">
        <span>Add Corporate</span>
    </a>
  </li>
  <li {if $smarty.server.REQUEST_URI eq '/admin-list-apartment'}class="active"{/if}>
    <a class="" href="/admin-list-apartment">
        <span>List of Appartments</span><span class="badge leftmenu_badge">{$acnt}</span>
    </a>
  </li>
  <li {if $smarty.server.REQUEST_URI eq '/admin-list-corporate'}class="active"{/if}>
    <a class="" href="/admin-list-corporate">
        <span>List of Corporates</span><span class="badge leftmenu_badge">{$ccnt}</span>
    </a>
  </li>
  <li {if $smarty.server.REQUEST_URI eq '/admin-add-menu'}class="active" {/if}>
    <a class="" href="/admin-add-menu">
        <span>Add Menu</span><span class="badge leftmenu_badge">{$items}</span>
    </a>
  </li>
</ul>