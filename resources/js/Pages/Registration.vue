<template>
    <div class="sa container py-28 ">
        <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
            <Form @submit="onSubmit">
                <div class="form-group mb-6">
                    <h2 class="justify-items-center font-mono " >
                        Registration Form
                    </h2>
                         <div v-for="item in errors">
                        <span v-if="errors" class="text-red-600 text-xs italic">{{item[0]}}</span>
                        </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group mb-6">
                        <Field type="text" name="first_name" v-model="first_name"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleInput123" aria-describedby="emailHelp123" placeholder="First name"
                            :rules="isRequired" />
                        <ErrorMessage name="first_name" />
                    </div>
                    <div class="form-group mb-6">
                        <Field type="text" name="last_name" v-model="last_name"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="exampleInput124" aria-describedby="emailHelp124" placeholder="Last name"
                            :rules="isRequired" />
                        <ErrorMessage name="last_name" />
                    </div>
                </div>
                <div class="form-group mb-6">
                    <Field name="email" type="text" v-model="email"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInput125" placeholder="Email address" :rules="validateEmail" />
                    <ErrorMessage name="email" />
                </div>
                <div class="form-group mb-6">
                    <Field type="password" name="password" v-model="password"
                        class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="exampleInput126" placeholder="Password" :rules="isRequired" />
                    <ErrorMessage name="password" />
                </div>
                <div class="form-group form-check text-center mb-6">
                    <input type="checkbox"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                        id="exampleCheck25" checked />
                    <label class="form-check-label inline-block text-gray-800" for="exampleCheck25">Subscribe to our
                        newsletter</label>
                </div>
                <button type="submit" @click="submit"
                    class="w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Sign up
                </button>
            </Form>
        </div>
    </div>
</template>

<script>
import { Field, Form, ErrorMessage } from "vee-validate";
export default {
    name: "registration",
    components: {
        Form,
        Field,
        ErrorMessage,
    },
    data() {
        return {
            first_name: "",
            last_name: "",
            password: "",
            email: "",
            errors:""
        };
    },
    methods: {
        isRequired(value) {
            if (value && value.trim()) {
                return true;
            }
            return 'This is required';
        },
        // validatefirst_name(value) {
        //     if (!value) {
        //         return "This field is required";
        //     }
        // },
        validateEmail(value) {
            // if the field is empty
            if (!value) {
                return "This field is required";
            }
            // if the field is not a valid email
            const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (!regex.test(value)) {
                return "This field must be a valid email";
            }
            // All is good
            return true;
        },
        submit() {
            const payload = {
                first_name: this.first_name,
                last_name: this.last_name,
                password: this.password,
                email: this.email,
            };
            axios.post("/api/noetic/create", payload).then((response) => {
                if (response.status === 200) {
                    // this.$inertia.get("/view");
                }
            }).catch((error) => {
                    if (error.response.status === 422){
                        this.errors = error.response.data.errors
                    }
                })
        },
    },
};
</script>

<style>
.checkbox:checked {
    /* Apply class right-0*/
    right: 0;
}

.sa {
    margin-left: 35rem;
}

.checkbox:checked+.toggle-label {
    /* Apply class bg-indigo-700 */
    background-color: #4c51bf;
}
</style>
