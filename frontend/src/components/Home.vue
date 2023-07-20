<template>
  <v-container>
    <v-row class="text-center">
      <v-col>
        <h1 id="nbr" class="display-2 font-weight-bold">
          {{ count }}
        </h1>
        items exist that have an age equal to or greater than 50
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  export default {
    name: 'Home',

    props: {
      count: {
        required: true,
        type: Number
      }
    },

    data() {
      return {
        total: 0
      }
    },

    watch: {
      count () {
        this.incEltNbr()
      }
    },

    methods: {
      /* Call this function with a string containing the ID name to
      * the element containing the number you want to do a count animation on.*/
      incEltNbr() {
        this.incNbrRec(this.total)

        this.total = this.count
      },

      /*A recursive function to increase the number.*/
      incNbrRec(i) {
        const elt = document.getElementById('nbr')

        console.log(elt.innerHTML);

        elt.innerHTML = i

        const self = this

        setTimeout(function() { // Delay a bit before calling the function again.
          if (i < self.count) {
            self.incNbrRec(++i, elt)
          } else if (self.count < i) {
            self.incNbrRec(--i, elt)
          }
        }, 10)
      }
    }
  }
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Montserrat:600');
*{
  font-family: 'Montserrat', sans-serif;
}

body{
  background:#FFCC10;
  text-align:center;
}

#nbr{
  font-size:62px;
  margin:44px 0 0 0;
}

button{
  outline:none;
  background:none;
  border:2px solid #000;
  padding:11px;
  cursor:pointer;
}

button:active{
  background:#000;
  color:#FFCC10;
}

</style>