<template>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img :src=logo   alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Cabinet {{ type }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img :src=userlogo  class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="/profile" class="d-block">{{ nom }} {{ prenom }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="/dashboard"   class="nav-link">

                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Ecran d'accueil
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/historique_malade"   class="nav-link">

                            <i class=" nav-icon fas fa-book"></i>
                            <p>
                                Historique des malades
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/antecedants"   class="nav-link">
                            <i class="nav-icon fas fa-hospital-symbol"></i>
                            <p>
                                Les Antécédants
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/consultations"   class="nav-link">
                            <i class="nav-icon fas fa-hospital-symbol"></i>
                            <p>
                                Les consultations
                            </p>
                        </a>
                    </li>
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="#" @click="logout"  class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Se deconnecter
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
<script>
export default {

    props: ['logo','userlogo','type','nom','prenom'],

    data() {
        return {

        }

    },
    methods:{
         logout(){
            axios.post('/logout').then((res)=>{
                window.location.href = '/';
            })

        }
    }
}
</script>
