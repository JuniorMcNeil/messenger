<template>
   <b-row>
       <b-col cols="8">
             <b-card
          footer-bg-variant="light"
          footer-border-variant="dark"
          title="Title"
          class="h-100">
<message-conversation-component 
    v-for="message in messages"
    :key="message.id"
    :written-by-me="message.written_by_me">
    {{ message.content}}
</message-conversation-component>




    <p class="card-text">Conversación Activa</p>
    <div slot="footer">
        <b-form class="mb-0" @submit.prevent="postMessages" autocomplete="off">
           <b-input-group>
              <b-form-input class="text-center"
                 type="text"
                 v-model="newMessage"
                 placeholder="Escribe un mensaje...">
              </b-form-input>
              <b-input-group-append>
                 <b-button type="submit" variant="primary">Enviar  </b-button>
              </b-input-group-append>
            </b-input-group>


       </b-form>
    </div>
  </b-card>
       </b-col>
       <b-col cols="4">
            <b-img rounded="circle" blank with="60" height="60" blank-color="#777" alt="img" class="m-1" />
            <p>Usuario Seleccionado</p>
            <br>
            <b-form-checkbox>
                Desactivar notificaciones
            </b-form-checkbox>
       </b-col>
   </b-row>


</template>

<script>
    export default {
        data() {
            return {
                messages: [],
                newMessage: ""
                   };
                }
    ,
        mounted() {
            this.getMessages();
        },
        methods: {
            getMessages(){
                axios.get('/api/messages')
                .then((response) => {
                    this.messages = response.data;
                });
            },
            postMessages(){
                const params={
                    to_id:2,
                    content:this.newMessage
                };
                axios.post('/api/messages',params)
                .then((response) => {
                    if (response.data.success) {
                       this.newMessage="";
                        this.getMessages();
                    }
                });
            }
        }

    }
</script>