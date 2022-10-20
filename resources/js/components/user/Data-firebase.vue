<template>
    <table>
  <thead>
    <tr>
        <th>Document Id</th>
          <th>Nama Buku</th>
          <th>Penerbit</th>
          <th>Penulis</th>
          <th>Tahun</th>
    </tr>
  </thead>
    <tbody>
        <tr v-for="n in datamasuk">
            <td>{{ n.id }}</td>
            <td>{{ n.nama_buku}}</td>
            <td>{{ n.penerbit}}</td>
            <td>{{ n.penulis}}</td>
            <td>{{ n.tahun}}</td>
        </tr>
    </tbody>
</table>
   
</template>

<script>    
    export default {
        props:['datamasuk'],
        mounted() {
            console.log('Component mounted.')   
            console.log(this.datamasuk)
           
        },
   

    }
</script>
