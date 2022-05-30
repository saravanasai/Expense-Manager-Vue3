<template>
    <MainLayout>
        <template v-slot:top-section>
            <Tittle>
                <template v-slot:pre-tittle>My Expenses</template>
                <template v-slot:page-tittle>My Expenses </template>
                <template v-slot:right-side-content>
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn btn-dark">Dashboard</a>
                        </span>
                        <router-link class="btn btn-primary d-none d-sm-inline-block" :to="{ name: 'books' }">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-arrow-narrow-left" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <desc>Download more icon variants from https://tabler-icons.io/i/arrow-narrow-left
                                </desc>
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <line x1="5" y1="12" x2="9" y2="16"></line>
                                <line x1="5" y1="12" x2="9" y2="8"></line>
                            </svg>
                            Back
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
                <div class="row row-cards">
                    <div class="col-md-10 offset-md-1" v-if="isLoadingExpense">
                        <Loader :isLoading="isLoadingExpense" />
                    </div>
                    <div class="col-md-12" v-if="expenses">
                        <template v-for="expense in expenses" :key="expense.expense_id">
                            <ExpenseCard :expenseId="expense.expense_id" :amount="expense.expense_amount"
                                :expenseType="expense.expense_type" :note="expense.expense_note"
                                :category="expense.expense_category.category" :created="expense.expense_created_at"
                                :handleDeleteExpense="handleDeleteExpense" />
                        </template>
                    </div>
                    <Pagination :data="paginationData" @pagination-change-page="getResults" :align="'right'" />
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script>
import MainLayout from "../../layout/Main/Main.vue";
import Tittle from "../../layout/Tittle/Tittle.vue";
import Loader from "../../../components/Loader/Loader.vue";
import LaravelVuePagination from 'laravel-vue-pagination';
import ExpenseCard from "../../../components/Widget/ExpenseCard/ExpenseCard.vue"
import useExpense from "../../composables/useExpense"
import { onMounted } from '@vue/runtime-core';
export default {
    components: { MainLayout, Tittle, ExpenseCard, Loader, 'Pagination': LaravelVuePagination },
    props: {
        id: Number,
    },
    setup(props) {

        const { isLoadingExpense, expenses, paginationData, getExpense, deleteExpense } = useExpense();

        onMounted(() => {
            getExpense(props.id)
        })

        const getResults = (page = 1) => {

            getExpense(props.id, page)

        }

        const handleDeleteExpense = (id) => {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2fb344',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    deleteExpense(id)
                        .then(e => {

                            if (e.status == 204) {
                                getExpense(props.id)
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: `Transaction Deleted`,
                                    toast: true,
                                    showConfirmButton: false,
                                    timer: 1500,
                                })
                            }

                        })

                }
            })

        }

        return { expenses, isLoadingExpense, paginationData, getResults, handleDeleteExpense };
    },
};
</script>

<style>
</style>
