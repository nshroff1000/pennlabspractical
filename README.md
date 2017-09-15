# Penn Labs: Backend Technical Project
Let's build an API server for Trello! If you're not familiar with Trello, it's not a problem. Trello is a task-management tool
that has 3 major functional components: Boards, Lists, and Cards. Each Board can contain many lists, which in turn can contain many cards. 
Each card generally represents an individual task that users can manage. Each list is a group of related tasks. We encourage you to play 
around with the tool [here](http://www.trello.com). A Board is a something that you might use to organize all of your tasks for one facet of your life. For example, we might have a board for School. In the School board, you might have a list for each class that you are taking. Within each list, you might have cards that represent homework assignments, tests, or projects. 

As a general tip, make sure to comment your code. Feel free to use credible third party libraries or packages. Feel free to add your own spicy features, as long as they don't disturb the core functionality of the API server.

There are two parts to this assignment. 


## Part 1: API Server

First, take a look at the structure for the data we'd like you to assume:
### Structure of data
- Card
  - title: `String`
  - description: `String`
  - listId: `Number`
  - id: `Number`
- List
  - title: `String`
  - order: `Number`
  - id: `Number`

Build an API server that has the following routes. 
You are free to use any datastore that you prefer (i.e: some database or a json/yaml file etc.). 
You may assume that there is only one board to work with (you need not worry about associating lists with boards or cards with boards).
Responses to requests to your API server should be in JSON format and at minimum contain a status code.

- POST `/card`
  - Description: Should add a card to the datastore with the given title and description. The card should be associated with the list with the provided listId.
  - params: listId, title, description
- POST `/list`
  - Description: Should add a list to the datastore with the given title. The newly added list's order 
  - params: title
- POST `/editlist/:listId`
  - Description: Should update the list with the provided listId. Should update only the fields provided in the querystring.
  - params: title, order
- GET `/card/:cardid`
  - Description: Should get title, description, and listId from the card associated with the specified cardId
- GET `/list/:listId`
  - Description: Should get title and order from the list associated with the specified listId
- DELETE `/list/:listId`
  - Description: Should delete the list associated with the specified listId
- DELETE `/card/:cardId`
  - Description: Should delete the list associated with the specified listId

To clear things up a bit, consider the following example:
- Backend datastore may be a JSON file that looks like:
  ```
    {
      lists: {
        "1234": {
          "title": "Grocery List",
          "order": 1
        }
      }
      "cards": {
        "5234": {
          "title": "Eggs",
          "description": "Buy many eggs"
        }
      }
    }
    ```
- User sents GET `/list/1234`
- Assuming the request is well-formed, the user receives the following response:
  ```
  {
    status: 200,
    title: "Grocery List",
    order: 1
  }
  ```

## Part 2: Data form
Build an HTML form that enables form users to add cards and add lists. You can use this form to test your API server.
