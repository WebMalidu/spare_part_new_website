async function user() {
       const obj = new Sender();
       const result = await obj.dataLoad('http://localhost:9001/backend/api/categoriesLoad.php');
       console.log(result);
}



