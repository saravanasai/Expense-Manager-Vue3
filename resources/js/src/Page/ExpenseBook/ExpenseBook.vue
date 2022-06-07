<template>
    <MainLayout>
        <template v-slot:top-section>
            <Tittle>
                <template v-slot:pre-tittle>My Expense Books</template>
                <template v-slot:page-tittle>My Books </template>
                <template v-slot:right-side-content>
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn btn-dark">Dashboard</a>
                        </span>
                        <router-link class="btn btn-primary d-none d-sm-inline-block" :to="{ name: 'new-book' }">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Add New Book
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
                    <!-- section for add income & expense model   -->
                    <Teleport to="#model">
                        <SimpleModal v-if="addIncomeModelStatus" :handleClose="handleModelToggle"
                            :modelTittle="expenseType == 1 ? 'Add New Expense' : 'Add New Income'"
                            :btnText="expenseType == 1 ? 'Spend' : 'Earn'" :handleSubmit="handleAddExpense">
                            <template v-slot:body>
                                <form action="" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="number" v-model="expenseAmount" class="form-control"
                                            placeholder="Enter Amount">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <div class="form-selectgroup form-selectgroup-pills">
                                            <template v-for="category  in categories" :key="category.id">
                                                <label class="form-selectgroup-item">
                                                    <input type="radio" name="name" :value="category.id"
                                                        class="form-selectgroup-input" v-model="expenseCategory"
                                                        :checked="(expenseCategory == category.id) ? true : false">
                                                    <span class="form-selectgroup-label">{{ category.category }}</span>
                                                </label>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Textarea <span class="form-label-description">{{
                                                expenseNote.length
                                        }}/100</span></label>
                                        <textarea class="form-control" v-model="expenseNote"
                                            name="example-textarea-input" rows="3" placeholder="Content.."></textarea>
                                    </div>
                                </form>
                            </template>
                        </SimpleModal>
                    </Teleport>
                    <!--end  section for add income & expense model   -->
                    <div class="col-md-10 offset-md-1" v-if="isLoading">
                        <Loader :isLoading="isLoading" />
                    </div>
                    <div class="col-md-10 offset-md-1" v-if="!isLoading">
                        <template v-for="book in expenseBooks" :key="book.id">
                            <BookCard :bookId="book.id" :bookName="book.book" :bookDescription="book.description"
                                :bookOwner="book.user.name" :handleDeleteExpenseBook="handleDeleteExpenseBook"
                                :addExpenseModelToggle="handleModelToggle"
                                 />
                        </template>
                    </div>
                </div>
            </div>
        </template>
    </MainLayout>
</template>

<script>
import MainLayout from "../../layout/Main/Main.vue";
import Tittle from "../../layout/Tittle/Tittle.vue";
import Loader from "../../../components/Loader/Loader.vue";
import BookCard from "../../../components/Widget/BookCard/BookCard.vue";
import SimpleModal from "../../../components/Modal/SimpleModel.vue";
import useExpenseBook from "../../composables/useExpenseBook";
import useExpense from "../../composables/useExpense";
import useCategory from "../../composables/useCategory";

import { onMounted, ref, toRefs, reactive } from "@vue/runtime-core";
export default {
    components: { MainLayout, Tittle, BookCard, SimpleModal, Loader },
    setup() {

        const addIncomeModelStatus = ref(false);


        const addExpenseState = reactive({
            bookId: 0,
            expenseCategory: 10,
            expenseAmount: '',
            expenseNote: '',
            expenseType: 0,
        })

        const shareBookState = reactive({
            shareBookId: 0,
            shareToUsers: []
        })

        const { isLoading, expenseBooks, getExpenseBooks, deleteExpenseBook } =
            useExpenseBook();

        const { getCategories, categories, isLoadingCategories } = useCategory()
        const { addExpense, isLoadingExpense } = useExpense()

        onMounted(() => {
            getExpenseBooks();
            getCategories();
        });

        const handleModelToggle = (bookId, expenseType) => {

            addExpenseState.bookId = bookId
            addExpenseState.expenseType = expenseType
            addExpenseState.expenseCategory = 10
            addExpenseState.expenseAmount = ''
            addExpenseState.expenseNote = ''

            addIncomeModelStatus.value = !addIncomeModelStatus.value;
        };

        const handleAddExpense = () => {

            let data = {

                expense_book_id: addExpenseState.bookId,
                expense_category: addExpenseState.expenseCategory,
                expense_amount: addExpenseState.expenseAmount,
                expense_type: addExpenseState.expenseType,
                expense_note: addExpenseState.expenseNote,

            }

            addExpense(data).then(e => {

                if (e.status == 201) {

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: `Transaction Completed`,
                        toast: true,
                        showConfirmButton: false,
                        timer: 1500,
                    }).then((e) => {

                        handleModelToggle(0, 0)
                    });

                }

            })

        }




        const handleDeleteExpenseBook = (id) => {
            deleteExpenseBook(id).then((e) => {
                if (e.status == 204) {
                    getExpenseBooks();
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: `Expense Book Deleted`,
                        toast: true,
                        showConfirmButton: false,
                        timer: 1500,
                    }).then((e) => { });
                }
            });
        };

        return {
            expenseBooks,
            categories,
            isLoading,
            handleDeleteExpenseBook,
            addIncomeModelStatus,
            handleModelToggle,
            handleAddExpense,

            ...toRefs(addExpenseState)
        };
    },
};
</script>

<style>
/* we will explain what these classes do next! */
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 15;
}
</style>
