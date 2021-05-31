<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Les Dents</h3>
                            <div class="text-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterDents">
                                Ajouter une dent
                            </button></div>
                            <!-- Modal -->
                            <div class="modal fade" id="ajouterDents" tabindex="-1" role="dialog" aria-labelledby="ajouterDentsTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ajouterDentTitle">Ajouter Dent</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="col-form-label">Dent nom :</label>
                                            <input type="text" class="form-control" v-model="nomDent">
                                            <div
                                                v-if="nomDentErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ nomDentErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Numéro:</label>
                                            <input type="text" class="form-control" v-model="numero">
                                            <div
                                                v-if="numeroErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ numeroErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Emplacement :</label>
                                            <input type="text" class="form-control" v-model="emplacement">
                                            <div
                                                v-if="emplacementErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ emplacementErrors }}
                                                </p>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="button" @click="ajouterDent" class="btn btn-primary">Ajouter la dent</button>
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
                                    <th>Dent Nom</th>
                                    <th>Numéro</th>
                                    <th>Emplacement</th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr v-for="dent in dents" :key="dent.id">
                                    <td>{{ dent.dent}}</td>
                                    <td>{{ dent.numero}}</td>
                                    <td>{{ dent.emplacement}}</td>
                                    <td><button @click="removeDent(dent.id)" class="btn btn-danger"> Supprimer</button></td>




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
    name: "AjouterDentComponent",
    data() {
        return {
            dents: {},
            nomDent:"",
            numero:"",
            emplacement:"",
            nomDentErrors:"",
            numeroErrors:"",
            emplacementErrors:"",

        }
    },
    methods: {
        removeDent(id){
            Swal.fire({
                title: 'Vous etes sur?',
                text: "Cette dent sera supprimer de façon définitive !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Supprimez la !'
            }).then((result) => {

                if (result.isConfirmed) {
                    axios.get("/delete_dent/"+id).then((data)=>{

                            Swal.fire(
                                'Supprimer !',
                                "L'antécédant a été supprimer avec succés",
                                'success'
                            )
                            this.loadDent();


                    })

                }
            }).catch(()=>{
                Swal.fire({
                    icon: 'warning',
                    title: "Erreur Impossible de supprimer la dent "
                })

            })

        },
        loadDent() {
            axios.get("/get_dents").then((data) => {
                this.dents =data.data
            })
        },
        ajouterDent(){
            this.emplacementErrors="";
            this.nomDentErrors="";
            this.numeroErrors="";
            var formData = new FormData();
            formData.append('numero',this.numero)
            formData.append('dent',this.nomDent)
            formData.append('emplacement',this.emplacement)

            axios.post("/ajouter_dent",formData,{
                headers: {"Content-Type": "multipart/form-data"}
            }).then(() => {
                $('#ajouterDents').modal('hide')
                this.emplacementErrors="";
                this.nomDentErrors="";
                this.numeroErrors="";
                this.numero="";
                this.nomDent="";
                this.emplacement="";
                Swal.fire({
                    icon: 'success',
                    title: 'La dent a été ajouté correctement'
                })
                this.loadDent();
            }).catch((error)=>{
                if (error.response.data.errors.numero) {
                    this.numeroErrors = error.response.data.errors.numero[0];
                }
                if (error.response.data.errors.dent) {
                    this.nomDentErrors = error.response.data.errors.dent[0];
                }
                if (error.response.data.errors.emplacement) {
                    this.emplacementErrors = error.response.data.errors.emplacement[0];
                }
            })
        }
    },
    created() {
        this.loadDent();

    },
}
</script>
