<template>
    <MainLayout>
        <template v-slot:top-section>
            <Tittle>
                <template v-slot:pre-tittle>Share Book</template>
                <template v-slot:page-tittle>Share Book </template>
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
                        <h3 class="card-title">Share Expense Book</h3>
                    </div>
                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="card card-sm mb-5">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto col-md-6">
                                            <span class="bg-twitter text-white avatar">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-book-2" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <desc>Download more icon variants from
                                                        https://tabler-icons.io/i/book-2</desc>
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z">
                                                    </path>
                                                    <path d="M19 16h-12a2 2 0 0 0 -2 2"></path>
                                                    <path d="M9 8h6"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ expenseBook.book }}
                                            </div>
                                            <div class="text-muted">
                                                {{ expenseBook.description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Share To</label>
                                <div class="col">
                                    <input type="email" v-model="shareToEmail" class="form-control"
                                        aria-describedby="email address" placeholder="Enter Email Address">
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="button" @click="handleShareBook" class="btn btn-success float-end"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-share"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <desc>Download more icon variants from https://tabler-icons.io/i/share</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="6" cy="12" r="3"></circle>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="18" cy="18" r="3"></circle>
                                        <line x1="8.7" y1="10.7" x2="15.3" y2="7.3"></line>
                                        <line x1="8.7" y1="13.3" x2="15.3" y2="16.7"></line>
                                    </svg>Share</button>
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
    props: {
        id: Number,
    },
    components: { MainLayout, Tittle, ExpenseCard },
    setup(props) {


        const state = reactive({
            bookName: '',
            bookDescription: ''
        })

        const shareBookState = reactive({
            shareToEmail: '',
        })

        const { isLoading, expenseBook, getExpenseBook, shareExpenseBook } = useExpenseBook();
        const { route, router } = useNavigation()


        onMounted(() => {
            getExpenseBook(props.id)
        })

        const handleShareBook = () => {

            shareExpenseBook(shareBookState)
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
                            .then(e => {
                                router.push({ name: 'books' })
                            });
                    }

                })


        }


        return { isLoading, ...toRefs(state), ...toRefs(shareBookState), handleShareBook, expenseBook };
    },
};
</script>

<style>
</style>
