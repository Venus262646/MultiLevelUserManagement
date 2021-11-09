<!--**********************************
  Sidebar start
***********************************-->
<div class="deznav">
  <div class="deznav-scroll">
    <ul class="metismenu" id="menu">
      <li>
        <a href="{!! url('/dashboard'); !!}" class="ai-icon">
          <i class="flaticon-381-networking"></i>
          <span class="nav-text">Dashboard</span>
        </a>
      </li>
      <?php if(Illuminate\Support\Facades\Auth::user()->level != "Familiar") {?>
        <li>
          <a href="{!! url('/user/list'); !!}" class="ai-icon">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Usuarios</span>
          </a>
        </li>
      <?php }?>
      <?php
        switch(Illuminate\Support\Facades\Auth::user()->level) {
          case "SuperAdmin": {?>
            <li>
              <a href="{!! url('/superadmin/createNewAdmin'); !!}" class="ai-icon">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">Create New Admin</span>
              </a>
            </li>
            <li>
              <a href="{!! url('/callcenter/getCreateForm'); !!}" class="ai-icon">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">Create New Call Center</span>
              </a>
            </li>
          <?php }
            break;
          case "Admin": {?>
            <li>
              <a href="{!! url('/admin/createNewCoordinador'); !!}" class="ai-icon">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">Create New Coordinador</span>
              </a>
            </li>
            <li>
              <a href="{!! url('/callcenter/getCreateForm'); !!}" class="ai-icon">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">Create New Call Center</span>
              </a>
            </li>
          <?php }
            break;
          case "Coordinador": {?>
            <li>
              <a href="{!! url('/coordinador/createNewSeccional'); !!}" class="ai-icon">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">Create New Seccional</span>
              </a>
            </li>
          <?php }
            break;
          case "Seccional": {?>
            <li>
              <a href="{!! url('/seccional/createNewMovilizador'); !!}" class="ai-icon">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">Create New Movilizador</span>
              </a>
            </li>
          <?php }
            break;
          case "Movilizador": {?>
            <li>
              <a href="{!! url('/movilizador/createNewFamiliar'); !!}" class="ai-icon">
                <i class="flaticon-381-notepad"></i>
                <span class="nav-text">Create New Familiar</span>
              </a>
            </li>
          <?php }
            break;
        }
      ?>
    </ul>
  </div>
</div>
<!--**********************************
  Sidebar end
***********************************-->
