<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Les type de consultations</h3>
                            <div class="text-right"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterTypeConsultation">
                                Ajouter un type de consultation
                            </button></div>



                            <!-- Modal -->
                            <div class="modal fade" id="ajouterTypeConsultation" tabindex="-1" role="dialog" aria-labelledby="ajouterTypeConsultationTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ajouterTypeConsultationTitle">Ajouter un type de consultation</h5>
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
                                            <button type="button" @click="ajouterTypeConsultation" class="btn btn-primary">Save changes</button>
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


                                <tr v-for="consultation in consultations" :key="consultation.id">
                                    <td>{{ consultation.id}}</td>

                                    <td>{{ consultation.type}}</td>
                                    <td><button @click="remove(consultation.id)" class="btn btn-danger"> Supprimer</button></td>




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
    name: "ConsultationComponent",
    data() {
        return {
            consultations: {},
            type:"",
            typeError:"",

        }
    },
    methods: {
        remove(id){
            Swal.fire({
                title: 'Vous etes sur?',
                text: "Cette Consultation sera supprimer de façon définitive !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Supprimez la !'
            }).then((result) => {

                if (result.isConfirmed) {
                    axios.get("/delete_type_consultation/"+id).then((data)=>{
                        if(data.data.status !== 0 ){
                            Swal.fire(
                                'Supprimer !',
                                "La consultation a été supprimer avec succés",
                                'success'
                            )
                            this.loadTypeConsultations();
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
        loadTypeConsultations() {
            axios.get("/get_type_consultations").then((data) => {
                this.consultations =data.data
            })
        },
        ajouterTypeConsultation(){
            this.typeError=""
            var formData = new FormData();
            formData.append('type',this.type)
            axios.post("/ajouter_type_consultation",formData,{
                headers: {"Content-Type": "multipart/form-data"}
            }).then(() => {
                this.type=""
                $('#ajouterTypeConsultation').modal('hide')
                Swal.fire({
                    icon: 'success',
                    title: 'Consultation ajouter correctement'
                })
                this.loadTypeConsultations();

            }).catch((error)=>{
                if (error.response.data.errors.type) {
                    this.typeErrors = error.response.data.errors.type[0];
                }
            })
        }
    },
    created() {
        this.loadTypeConsultations();

    },
}
</script>
