@extends('layouts.generalLayout')

@section('page_content')
    <div class="container">
        <h3>Categorías registradas en el sistema</h3>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categoriesList.data">
                <td>@{{ category.data.id }}</td>
                <td>@{{ category.data.attributes.name }}</td>
                <td>
                    <model-category-edit
                        v-bind:key="category.data.id"
                        :category="category.data"
                        :link_edit="category.meta.link_edit"
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
            props: ['category', 'link_edit'],
            data: function () {
                return {
                    draft: JSON.parse(JSON.stringify(this.category))
                }
            },
            template: `
              <div>
                <b-button v-b-modal="'modal-category-' + draft.id">Editar</b-button>
                    <b-modal
                      :id="'modal-category-' + draft.id"
                      @ok="handleOk"
                      @cancel="handleCancel"
                    >
                      <form ref="form" @submit.stop.prevent="handleSubmit">
                        <b-form-group
                          label="Name"
                          label-for="name-input"
                          invalid-feedback="Name is required"
                        >
                          <b-form-input
                            id="name-input"
                            v-model="category.attributes.name"
                            required
                          ></b-form-input>
                        </b-form-group>
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
                        this.$bvModal.hide('modal-category-' + this.draft.id);
                    });

                    axios.put(this.link_edit, this.category)
                        .then(function (response) {
                            alert('Categoría actualizada!');
                        })
                        .catch(function (error) {
                            alert('Ocurrio un error actualizando la categoría!');
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
                categoriesList: {!! $categoriesList !!}
            }
        })
    </script>
@endpush
