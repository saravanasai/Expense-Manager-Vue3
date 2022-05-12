<template>
  <MainLayout>
    <template v-slot:top-section>
      <Tittle>
        <template v-slot:pre-tittle>Add Book</template>
        <template v-slot:page-tittle>New Book</template>
        <template v-slot:right-side-content>
          <div class="btn-list">
            <span class="d-none d-sm-inline">
              <router-link :to="{name:'home'}" class="btn btn-dark">Dashboard</router-link>
            </span>
            <router-link

              class="btn btn-primary d-none d-sm-inline-block"
              :to="{name:'book'}"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
              </svg>
             My Books
            </router-link>
            <a
              href="#"
              class="btn btn-primary d-sm-none btn-icon"
              data-bs-toggle="modal"
              data-bs-target="#modal-report"
              aria-label="Create new report"
            >
              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="icon"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
                fill="none"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
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
            <div class="col-md-12s" v-if="expenses">
            <template v-for="expense in expenses" :key="expense.id">
                <ExpenseCard
                :amount="expense.expense_amount"
                :note="expense.expense_note"
                :category="expense.expense_category.category_name"
                :created="expense.expense_created_at"

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
import ExpenseCard from "../../../components/Widget/ExpenseCard/ExpenseCard.vue"
import useExpense from "../../composables/useExpense"
import { onMounted } from '@vue/runtime-core';
export default {
  components: { MainLayout, Tittle,ExpenseCard },
  setup() {

    const {isLoading,expenses,getExpense}=useExpense();

    onMounted(()=>{

      getExpense()

    })

    return {expenses,isLoading};
  },
};
</script>

<style>
</style>
