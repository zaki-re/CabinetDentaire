<template>
    <div class="content-wrapper">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card card-default  h-100">
                        <div class="card-header card-header-border-bottom justify-content-between">
                            <h2>Malade Informations</h2>
                        </div>

                        <div class="card-body h6">
                            <div class="row my-3">
                                <div class="col-3">Nom :</div>
                                <div class="col-9">{{ malade.nom }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Prenom :</div>
                                <div class="col-9">{{ malade.prenom }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Address :</div>
                                <div class="col-9">{{ malade.address }}</div>
                            </div>
                            <div class="row my-3">
                                <div class="col-3">Mobile :</div>
                                <div class="col-3">{{ malade.mobile }}</div>

                            </div>
                            <div class="row my-3">
                                <div class="col-3">Age :</div>
                                <div class="col-3">{{ malade.age }}</div>

                            </div>
                            <div class="row my-3">
                                <div class="col-3">Antécedants :</div>

                                <div class="col-2" v-for="antecedant in antecedants " :key="antecedant">
                                    <h4 class="text-danger">{{antecedant}}</h4>
                                </div>

                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modifierPatient">
                                Modifier Les information du patient
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajouterConsultation">
                                Ajouter une consultation
                            </button>
                            <div class="modal fade" id="ajouterConsultation" tabindex="-1" role="dialog" aria-labelledby="ajouterConsultationTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ajouterConsultationTitle">Ajouter une Consultation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="col-form-label">Prochaine Rendez vous:</label>
                                            <input type="date" class="form-control" v-model="prochaineRdv" >
                                            <div
                                                v-if="prochaineRdvErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ prochaineRdvErrors }}
                                                </p>
                                            </div>
                                            <label class="typo__label">Dents :</label>
                                            <multiselect v-model="dentsChoisi" tag-placeholder="Add this as new tag" placeholder="Ajouter Les dents traiter" label="numero" track-by="id" :options="dents" :multiple="true" :taggable="true" @tag="addTag"></multiselect>

                                            <label class="typo__label">Type de consultation</label>
                                            <select class="form-control" v-for="type in typeConsultation" v-model="typeConsultationChoisi">
                                                <option class="form-control" :value="type.type" > {{type.type}}</option>
                                            </select>


                                            <label class="col-form-label">Soins:</label>
                                            <textarea type="text" class="form-control" v-model="soins" ></textarea>
                                            <div
                                                v-if="soinsErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ soinsErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Versement:</label>
                                            <input type="text" class="form-control" v-model="versement" >
                                            <div
                                                v-if="versementErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ versementErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Rest:</label>
                                            <input type="text" class="form-control" v-model="rest" >
                                            <div
                                                v-if="restErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ restErrors }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="button" @click="ajouterConsultation"  class="btn btn-primary">Ajouter la consultation</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modifierPatient" tabindex="-1" role="dialog" aria-labelledby="modifierPatientTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modifierPatientTitle">Modifier Patient</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label class="col-form-label">Nom:</label>
                                            <input type="text" class="form-control" v-model="malade.nom" >
                                            <div
                                                v-if="nomErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ nomErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Prenom:</label>
                                            <input type="text" class="form-control" v-model="malade.prenom" >
                                            <div
                                                v-if="prenomErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ prenomErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Address:</label>
                                            <input type="text" class="form-control" v-model="malade.address" >
                                            <div
                                                v-if="addressErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ addressErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Mobile:</label>
                                            <input type="text" class="form-control" v-model="malade.mobile" >
                                            <div
                                                v-if="mobileErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ mobileErrors }}
                                                </p>
                                            </div>
                                            <label class="col-form-label">Age:</label>
                                            <input type="text" class="form-control" v-model="malade.age" >
                                            <div
                                                v-if="ageErrors !== ''"
                                            >
                                                <p class="text-danger">
                                                    {{ ageErrors }}
                                                </p>
                                            </div>
                                                <label class="typo__label">Antecedents</label>
                                                <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Ajouter les antécédents" label="type" track-by="id" :options="options" :multiple="true" :taggable="true" @tag="addTag"></multiselect>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="button" @click="updatePatient"  class="btn btn-primary">Modifier Patient</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">Les rendez vous</div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Dents</th>
                                            <th scope="col">Soins</th>
                                            <th scope="col">Prochain RDV</th>
                                            <th scope="col">Versement</th>
                                            <th scope="col">Rest</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-normal h6">
                                            <th>1234001</th>
                                            <td>test</td>
                                            <td>500.00</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>500</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

            </div>
        </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
import Multiselect from 'vue-multiselect'
export default {
    components: {
        Multiselect
    },
    data() {
        return {
            value: [],
            options: [],
            malade:{},
            antecedants:{},
            nom:'',
            prochaineRdv:'',
            prochaineRdvErrors:'',
            dents:[],
            dentsChoisi:[],
            typeConsultation:[],
            typeConsultationChoisi:"",
            dentsChoisiErrors:'',
            nomErrors:'',
            soins:'',
            soinsErrors:'',
            ageErrors:'',
            errors:'',
            prenomErrors:'',
            addressErrors:'',
            mobileErrors:'',
            versement:'',
            versementErrors:'',
            rest:'',
            restErrors:'',
        };
    },
    methods: {
        ajouterConsultation(){


            var formData = new FormData();
            for (var i = 0; i < this.dentsChoisi.length; i++) {
                formData.append('dents[]', this.dentsChoisi[i].numero);
            }

            formData.append('soins',this.soins)
            formData.append('type_consultation',this.typeConsultationChoisi)


            formData.append('id_malade',this.malade.id)
            formData.append('versement',this.versement)
            formData.append('rest',this.rest)
            formData.append('date_prochaine_rdv',this.prochaineRdv)

          axios.post('/ajotuer_consultation',formData,{
              headers: {"Content-Type": "multipart/form-data"}
          }).then(()=>{
                console.log('working')
          })
        },
        updatePatient(){
            Swal.fire({
                title: 'Vous etes sur?',
                text: "vous voulez vraiment le mettre a jour !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Modifiez le !'
            }).then((result) => {

                if (result.isConfirmed) {

                    this.nomErrors= "";
                    this.ageErrors= "";
                    this.errors="",
                    this.prenomErrors= "";
                    this.addressErrors= "";
                    this.mobileErrors= "";
                    var formData = new FormData();
                    for (var i = 0; i < this.value.length; i++) {
                        formData.append('antecedants[]', this.value[i].id);
                    }
                    formData.append('nom',this.malade.nom)
                    formData.append('age',this.malade.age)
                    formData.append('prenom',this.malade.prenom)
                    formData.append('address',this.malade.address)
                    formData.append('mobile',this.malade.mobile)
                    axios.post("/update_patient/"+this.malade.id,formData,{
                        headers: {"Content-Type": "multipart/form-data"}
                    }).then((data)=>{
                        if(data.data.status !== 0 ){
                            $('#modifierPatient').modal('hide')

                            Swal.fire(
                                'Modifer !',
                                "Le patient a été modifier avec succés",
                                'success'
                            )
                            this.malade=data.data.malade;
                            this.getAntecedants();

                        }
                        else{
                            Swal.fire({
                                icon: 'warning',
                                title: "Impossible de supprimer l'antecedant car un malade est affecté a ce antecedant"
                            })

                        }
                    }).catch((error) => {
                        if (error.response.data.errors.age) {
                            this.ageErrors = error.response.data.errors.age[0];
                        }
                        if (error.response.data.errors.nom) {
                            this.nomErrors = error.response.data.errors.nom[0];
                        }

                        if (error.response.data.errors.address) {
                            this.addressErrors = error.response.data.errors.address[0];
                        }
                        if (error.response.data.errors.mobile) {
                            this.mobileErrors = error.response.data.errors.mobile[0];
                        }
                        if (error.response.data.errors.prenom) {
                            this.prenomErrors = error.response.data.errors.prenom[0];
                        }
                    })

                }
            })
        },
        addTag (newTag) {
            const tag = {
                name: newTag,
                code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
            }
            this.options.push(tag)
            this.value.push(tag)
        },
        getAntecedants(){
            axios.get('/malade_antecedants/'+this.malade.id).then((data)=> {

                this.antecedants=data.data
            })
        },
        loadAntecedants() {
            axios.get("/get_antecedants").then((data) => {
                this.options =data.data
            })
        },
        loadAdents() {
            axios.get("/getDents").then((data) => {
                this.dents =data.data
            })
        },
        loadTypeConsultations() {
            axios.get("/get_consultations").then((data) => {
                this.typeConsultation =data.data
            })
        },
    },

    created() {
    this.malade=this.$attrs.malade
        this.loadAntecedants();
           this.getAntecedants();
           this.loadAdents();
           this.loadTypeConsultations();
    },
}

</script>
