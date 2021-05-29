<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="row mt-5 ml-5">
                <div class="card ">

                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">

                        <div class="text-center">
                            <h5 class="h3">
                                {{ malade.nom }} {{ malade.prenom }}<span class="font-weight-light">, {{malade.age}}</span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{malade.address}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{malade.mobile}}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card ml-5 ">

                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">

                        <div class="text-center">
                            <h5 class="h3">
                                {{ malade.nom }} {{ malade.prenom }}<span class="font-weight-light">, {{malade.age}}</span>
                            </h5>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{malade.address}}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{malade.mobile}}
                            </div>

                        </div>
                    </div>
                </div>





                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Malade : {{ malade.nom }} , {{ malade.prenom}}</h3>

                                <div class="card-tools">

                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="datatable">
                                    <thead>
                                    <tr>
                                        <th>Nom , Prenom</th>
                                        <th>Dents</th>
                                        <th>Soins</th>
                                        <th>Radio</th>
                                        <th>Rendez vous</th>
                                        <th>Versement</th>
                                        <th>Reste</th>

                                        <th></th>


                                    </tr>
                                    </thead>
                                    <tbody>


                           <!--         <tr v-for="malade in malades" :key="malade.id">
                                        <td>{{ malade.nom}}</td>
                                        <td>{{ malade.prenom}}</td>
                                        <td>{{ malade.age}}</td>
                                        <td>{{ malade.address}}</td>
                                        <td>{{ malade.mobile }}</td>
                                        <td>{{ malade.email }}</td>
                                        <td>
                                            <a href="/consulter_profile/" :href="'consulter_profile/'+malade.id" class="btn btn-primary" >
                                                Consulter le profile </a>
                                        </td>

                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
props: ['malade'];

export default {
    data() {
        return {
            malade:{},

        };
    },
    methode:{

    },
    created() {
    this.malade=this.$attrs.malade
    },
}

</script>
