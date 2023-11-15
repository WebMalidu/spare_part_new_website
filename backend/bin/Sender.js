class Sender {

       //you need to send GET method
       async dataLoad(filePath) {
              try {
                     const response = await fetch(filePath);

                     if (!response.ok) {
                            throw new Error(`Error fetching data: ${response.status}`);
                     }

                     const data = await response.json();

                     return data;

              } catch (error) {
                     console.error('Error fetching data:', error);
                     throw error;
              }
       }

       //you need to send POST method
       async dataIUD(form, filePath) {
              try {
                     const response = await fetch(filePath, {
                            method: 'POST',
                            body: form
                     });

                     if (!response.ok) {
                            throw new Error(`Error fetching data: ${response.status}`);
                     }

                     const data = await response.json();

                     return data;

              } catch (error) {
                     console.error('Error fetching data:', error);
                     throw error;
              }
       }

}

