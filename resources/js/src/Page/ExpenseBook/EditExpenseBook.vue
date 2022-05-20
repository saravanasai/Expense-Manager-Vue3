<template>
    <MainLayout>
        <template v-slot:top-section>
            <Tittle>
                <template v-slot:pre-tittle>Edit Book</template>
                <template v-slot:page-tittle>EditBook</template>
                <template v-slot:right-side-content>
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <router-link :to="{ name: 'home' }" class="btn btn-dark">Dashboard</router-link>
                        </span>
                        <router-link class="btn btn-primary d-none d-sm-inline-block" :to="{ name: 'books' }">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            My Books
                        </router-link>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                </template>
            </Tittle>
        </template>
        <template v-slot:content>
            <div class="card p-5">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title">Edit Expense Book</h3>
                    </div>
                    <div class="card-body mt-2">
                        <form>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Book Name</label>
                                <div class="col">
                                    <input type="text" v-model="expenseBook.book" class="form-control"
                                        aria-describedby="emailHelp" placeholder="Enter Book Name">
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Description</label>
                                <div class="col">
                                    <textarea class="form-control" v-model="expenseBook.description"
                                        name="example-textarea-input" rows="4" placeholder="Content..">

                        </textarea>
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="button" @click="handleUpdateBook"
                                    class="btn btn-success float-end">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script>
import MainLayout from "../../layout/Main/Main.vue";
import Tittle from "../../layout/Tittle/Tittle.vue";
import ExpenseCard from "../../../components/Widget/ExpenseCard/ExpenseCard.vue"
import useExpenseBook from "../../composables/useExpenseBook"
import { reactive, toRefs } from '@vue/reactivity';
import Swal from "sweetalert2";
import useNavigation from "../../composables/useNavigation";
import { onMounted } from "vue";
export default {
    props:{
        id:Number,
    },
    components: { MainLayout, Tittle, ExpenseCard },
    setup(props) {


        const state = reactive({
            bookName:'',
            bookDescription:''
        })

        const { isLoading, expenseBook,getExpenseBook,updateExpenseBook } = useExpenseBook();
        const {route,router}=useNavigation()


        onMounted(()=>{
            getExpenseBook(props.id)
        })

        const handleUpdateBook = () => {

            updateExpenseBook()
                .then(e => {
                    if (e.status == 200) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: `${e.data.message}`,
                            toast: true,
                            showConfirmButton: false,
                            timer: 1500,
                        })
                        .then(e=>{
                            router.push({name:'books'})
                        });
                    }

                })


        }


        return { isLoading, ...toRefs(state), handleUpdateBook,expenseBook };
    },
};
</script>

<style>
</style>
