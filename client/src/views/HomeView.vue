<template>
<div class="content_row">
  <div class="content_column">
    <div class="title">
      <h3>Welcome To Our Library</h3>
      <p>Search books on our website</p>
      <div class="content_row">
        <input placeholder="Search" type="text" name="search" id="search" class="input_text">
        <input type="submit" value="Search" class="input_submit">
      </div>
    </div>
  </div>
  <div class="content_column">
    <img src="/icon_globe.png" alt="">
  </div>
</div>
</template>

<script>

</script>
<style scoped>
.content_row{
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}
.content_column{
  display: flex;
  flex-flow: column nowrap;
  justify-content: center;
  align-items: center;
  text-align: center;
  margin: 40px;
}
.input_text{
  padding: 15px;
  border-radius: 6px;
  border:2px solid #fd8a5b
}
.input_text :active{
  border:2px solid #fd8a5b
}
.input_submit{
  background-color: #fd8a5b;
  padding: 15px 40px 15px 40px;
  margin-left: 10px;
  color: white;
  border: 0px;
  border-radius: 8px;
}
</style>
