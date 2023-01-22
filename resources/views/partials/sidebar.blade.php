<div class="sidebar close d-flex flex-column justify-content-around">
    <div class="logo-details d-flex justify-content-center">

        <span class="logo_name mt-2">Sisconver </span>

    </div>
    <ul class="nav-links ">
        <li class="d-flex justify-content-center align-content-center">

           <div>
            <a href="{{ '/home' }}">

                
 
                <i class="bi-house-fill"></i>
                <span class="link_name ">Inicio</span>
             
            
            
                           
                        </a>
            </div> 
          
            <ul class="sub-menu blank">
                <li><a class=" bi bi-house-fill text-white btn btn-primary " href="/home">Inicio  </a></li>
            </ul>
        </li>
        <li class="mt-2">
          <div class="iocn-link">
              <a href="{{ '/categorias' }}">
                  <i class='bx bxs-book'></i>
                  <span class="link_name">Categorias</span>
              </a>
              <i class='bx bxs-chevron-down arrow'></i>
          </div>
          <ul class="sub-menu">
              <li><a class="text-white btn btn-primary " href="/categorias">Gestion Categorias</a></li>
             

          </ul>
      </li>
        <li class="mt-2">
            <div class="iocn-link">
                <a href="{{ '/libros' }}">
                    <i class='bx bxs-book'></i>
                    <span class="link_name">Libros</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/libros">Gestion Libros</a></li>
               

            </ul>
        </li>
        <li class="">
            <div class="iocn-link">
                <a href="{{ '/elementos' }}">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Elementos</span>
                </a>

            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/elementos">Elementos</a></li>

            </ul>
        </li>
        <li class="mt-2">
            <a href="{{ '/prestamos' }}">
                <i class='bx bx-pie-chart-alt-2'></i>
                <span class="link_name">Prestamos</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="text-white btn btn-primary" href="/prestamos"> Prestamos</a></li>
            </ul>
        </li>
        <li class="mt-2">
            <div class="iocn-link">
                <a href="{{ '/devoluciones' }}">
                    <i class='bx bx-book-alt'></i>
                    <span class="link_name">Devoluciones</span>
                </a>
                
            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/devoluciones">Devoluciones</a></li>

            </ul>
        </li>




        <li class="mt-2">
            <div class="iocn-link">
                <a href="{{ '/usuarios' }}">
                    <i class='bx bxs-user-circle'></i>
                    <span class="link_name">Usuarios</span>
                </a>
                <i class='bx bxs-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="text-white btn btn-primary" href="/usuarios">Usuarios</a></li>

            </ul>
        </li>


        <li class="mt-2">
          <a href="#">
              <i class='bx bx-cog bx-spin-hover'></i>
              <span class="link_name">Setting</span>

          </a>
          <ul class="sub-menu blank">
              <li><a class="link_name" href="#">Setting</a></li>
              <ul class="">

                  <li><a href="#">Claro</a></li>
                  <li><a href="#">Oscuro</a></li>
                  <form class="col-8" method="POST" action="{{ route('logout') }} ">
                    @csrf

                    <li>  <a href="route('logout')"
                      onclick="event.preventDefault();
                      this.closest('form').submit();"
                      class=" dropdown-item">
                      {{ __('Log Out') }}
                  </a></li>
                    <li> <a :href="route('profile.edit')" class="dropdown-item">
                      {{ __('Profile') }}
                  </a></li>


                </form>
              </ul>
          </ul>
      </li>
    </ul>
    


</div>

