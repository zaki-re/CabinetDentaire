<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Les Antécédants</h3>
                            <div class="text-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterAntecedants">
                                Ajouter un antécédants
                            </button></div>



                            <!-- Modal -->
                            <div class="modal fade" id="ajouterAntecedants" tabindex="-1" role="dialog" aria-labelledby="ajouterAntecedantsTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="col-form-label">Type:</label>
                                            <input type="text" class="form-control" v-model="type">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" @click="ajouterAntecedants" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover" id="datatable">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Type</th>
                                    <th>Supprimer</th>

                                </tr>
                                </thead>
                                <tbody>


                                <tr v-for="antecedant in antecedants" :key="antecedant.id">
                                    <td>{{ antecedant.id}}</td>

                                    <td>{{ antecedant.type}}</td>
                                    <td><button @click="remove(antecedant.id)" class="btn btn-danger"> Supprimer</button></td>




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
    name: "AntecedantsDentisteComponent",
    data() {
        return {
            antecedants: {},
            type:"",

        }
    },
    methods: {
        remove(id){
            Swal.fire({
                title: 'Vous etes sur?',
                text: "Cette antécédant sera supprimer de façon définitive !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Supprimez le !'
            }).then((result) => {

                if (result.isConfirmed) {
                    axios.get("/delete_antecedants/"+id).then((data)=>{
                        console.log(data.data);
                        if(data.data.status !== 0 ){
                        Swal.fire(
                            'Supprimer !',
                            "L'antécédant a été supprimer avec succés",
                            'success'
                        )
                        this.loadAntecedants();
                        }
                        else{
                            Swal.fire({
                                icon: 'warning',
                                title: "Impossible de supprimer l'antecedant car un malade est affecté a ce antecedant"
                            })

                        }
                    })

                }
            })

        },
        loadAntecedants() {
            axios.get("/get_antecedants").then((data) => {
                this.antecedants =data.data
            })
        },
        ajouterAntecedants(){

            var formData = new FormData();
            formData.append('type',this.type)
            axios.post("/ajouter_antecedant",formData,{
                headers: {"Content-Type": "multipart/form-data"}
            }).then(() => {
                $('#ajouterAntecedants').modal('hide')
                Swal.fire({
                    icon: 'success',
                    title: 'Antecedants ajouter correctement'
                })
                this.loadAntecedants();
            })
        }
    },
    created() {
        this.loadAntecedants();

    },
}
</script>
