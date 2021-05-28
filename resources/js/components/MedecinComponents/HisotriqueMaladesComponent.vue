<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Malades</h3>

                            <div class="card-tools">


                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>Email</th>

                                    <th></th>


                                </tr>
                                </thead>
                                <tbody>


                           <tr v-for="malade in malades" :key="malade.id">
                                    <td>{{ malade.nom}}</td>
                                    <td>{{ malade.prenom}}</td>
                                    <td>{{ malade.age}}</td>
                                    <td>{{ malade.address}}</td>
                                    <td>{{ malade.mobile }}</td>
                                    <td>{{ malade.email }}</td>
                                    <td>
                                       <!-- <a href="#" class="btn btn-primary" @click="updatemodelfaq(faq)"> edit </a> -->
                                        <a href="/consulter_profile/" :href="'consulter_profile/'+malade.id" class="btn btn-primary" >
                                            Consulter le profile </a>
                                    </td>

                                </tr>
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
<script >
export default {
    name: "CenterManagementExpert",
    data() {
        return {
            malades: {},


        }
    },
    methods: {
         loadMalades() {
             axios.get("/getMalade").then((data) => {
                 this.malades =data.data
    })
        }
    },
     created() {
this.loadMalades();

    },
}
</script>
