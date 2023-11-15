class category {

     static productAPI = '../backend/api/categoriesLoad.php';

     async categoryLoad() {
          try {
               const getResponse = await fetch(productAPI);
               const result = await getResponse.json();

               if (result.status === 'success') {
                    return result.results
               } else {
                    throw new Error(result.error);
               }

          } catch (error) {
               throw new Error(error);
          }
     }

     async categoryAdd(categoryType) {

          const form = new FormData();
          form.append('categoryType', categoryType);

          try {
               const getResponse = await fetch(productAPI, {
                    method: 'POST',
                    body: form
               });

               const responseResult = await getResponse.json();
               if (responseResult.status === 'success') {
                    return ('success');
               } else {
                    throw new Error(responseResult.error);
               }

          } catch (error) {
               throw new Error(error);
          }
     }

     async categoryEdit(categoryId, categoryType) {

          const form = new FormData();
          form.append('categoryType', categoryType);
          form.append('categoryId', categoryId);

          try {
               const getResponse = await fetch(productAPI, {
                    method: 'POST',
                    body: form
               });
               const responseResult = await getResponse.json();
               if (responseResult.status === 'success') {
                    return ('success');
               } else {
                    throw new Error(responseResult.error);
               }
          } catch (error) {
               throw new Error(error);
          }
     }
}