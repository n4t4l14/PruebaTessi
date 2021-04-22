@extends('layouts.generalLayout')

@section('page_content')
    <div class="container">
        <h3>Articulos Por Categorías registradas en el sistema</h3>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Producto</th>
                <th>N. Registro</th>
                <th>Existencias</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in itemsList.data">
                <td>@{{ item.data.id }}</td>
                <td>@{{ item.data.attributes.name }}</td>
                <td>@{{ item.meta.category.name }}</td>
                <td>@{{ item.data.attributes.register_number }}</td>
                <td>@{{ item.data.attributes.quantity }}</td>
                <td>
                    <model-category-edit
                        v-bind:key="item.data.id"
                        :item="item"
                        :link_edit="item.meta.link_edit"
                    ></model-category-edit>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('page_scripts')
    <script>
        Vue.component('model-category-edit', {
            props: ['item', 'link_edit'],
            data: function () {
                return {
                    draft: JSON.parse(JSON.stringify(this.item.data))
                }
            },
            template: `
              <div>
                <b-button v-b-modal="'modal-item-' + draft.id">Editar</b-button>
                    <b-modal
                      :id="'modal-item-' + draft.id"
                      @ok="handleOk"
                      @cancel="handleCancel"
                    >
                      <form ref="form" @submit.stop.prevent="handleSubmit">

                        <b-form-group
                          label="Categoría"
                          invalid-feedback="La categoría es requerida!"
                        ></b-form-group>
                        <b-form-input
                        v-model="item.meta.category.name"
                        required
                        ></b-form-input>

                        <b-form-group
                          label="Producto"
                          invalid-feedback="El nombre del producto es requerido!"
                        ></b-form-group>
                        <b-form-input
                        id="name-input"
                        v-model="item.data.attributes.name"
                        required
                        ></b-form-input>

                        <b-form-group
                          label="N. Registro"
                          invalid-feedback="El # de registro es requerido!"
                        ></b-form-group>
                        <b-form-input
                        v-model="item.data.attributes.register_number"
                        required
                        ></b-form-input>

                        <b-form-group
                          label="Existencias"
                          invalid-feedback="La cantidad debe ser mayor a uno!"
                        ></b-form-group>
                        <b-form-input
                        v-model="item.data.attributes.quantity"
                        required
                        ></b-form-input>
                      </form>

                    </b-modal>
              </div>
           `,
            methods: {
                handleOk(bvModalEvt) {
                    bvModalEvt.preventDefault()
                    this.handleSubmit()
                },
                handleSubmit() {
                    this.$nextTick(() => {
                        this.$bvModal.hide('modal-item-' + this.draft.id);
                    });

                    axios.put(this.link_edit, this.item)
                        .then(function (response) {
                            alert('Articulo actualizado!');
                        })
                        .catch(function (error) {
                            console.log(error.response.status);
                            if (error.response.status == 506) {
                                alert('Lo sentimos este número de registro ya está asignado!');
                                return;
                            }

                            alert('Ocurrio un error actualizando el Articulo!');
                        });
                },
                handleCancel() {
                    this.draft = this.category;
                }
            }
        });

        // variable app contendra toda la logica del vue
        var app
            = new Vue({
            el: '#app',
            data: {
                itemsList: {!! $itemsList !!}
            }
        })
    </script>
@endpush
