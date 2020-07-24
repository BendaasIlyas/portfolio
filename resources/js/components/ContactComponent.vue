<template>
  <div>
    <h1>Contact Me</h1>
    <form @submit.prevent="createContact">
      <div class="form-group">
        <label>Name</label>
        <input v-model="contact.name" type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input v-model="contact.email" type="text" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input v-model="contact.phone" type="text" name="phone" class="form-control">
      </div>
      <div class="form-group">
        <label>Subject</label>
        <input v-model="contact.subject" type="text" name="subject" class="form-control">
      </div>
      <div class="form-group">
        <label>Message</label>
        <input v-model="contact.message" type="text" name="message" class="form-control">
      </div>
      <div class="form-group">
        <button class="btn btn-primary">Send</button>
      </div>
    </form>
  </div>
</template>

<script>
  export default {
    data(){
      return {
        contact:this.getBasicForm()
      }
    },
    methods: {
      getBasicForm() {
      return {
        name: '',
        email: '',
        phone: '',
        subject: '',
        message: ''
      }
      },  
      createContact: function(){
            let contact = this.contact;
            let uri = 'http://portfolio.test/api/contact';
            this.axios.post(uri, this.contact).then((response) => {
            this.$router.push({name: 'contact'});
            this.contact = this.getBasicForm();
      });
    }
    }
  }
</script>