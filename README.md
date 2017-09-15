# Penn Labs: Backend Technical Project
Let's build an API server for Trello! If you're not familiar with Trello, it's not a problem. Trello is a task-management tool
that has 3 major functional components: Boards, Lists, and Cards. Each Board can contain many lists, which in turn can contain many cards. 
Each card generally represents an individual task that users can manage. Each list is generally a list of tasks. We encourage you to play 
around with the tool ![here](http://www.trello.com).

There are two parts to this assignment. 


## Part 1: API Server

Firstly, take a look at the structure for the data we'd like you to assume:
### Structure of data
- Card
  - Title: String
  - Description: String
  - listId: Number
  - id: Number
- List
  - Title: String
  - Order: Number
  - id: Number

Build an API server that has the following routes. You are free to use any datastore that you prefer (i.e: some database or a json/yaml file etc.)
- POST /card
  - Description: Should add a card to the datastore with the given title and description. The card should be associated with the list with the provided listId.
  - params: listId, title, description
- POST /list
  - Description: Should add a list to the datastore with the given title. The newly added list's order 
  - params: title
- POST /editlist
  - Description: Should update the list with the provided listId. Should update only the fields provided in the querystring.
  - params: listId
  - querystring: title, order
- GET /card/:cardid
  - Description: Should get title, description, and listId from the card associated with the specified cardId
- GET /list/:listId
  - Description: Should get title and order from the list associated with the specified listId
- DELETE /listId
  - Description: Should delete the list associated with the specified listId
- DELETE /cardId
  - Description: Should delete the list associated with the specified listId

## Part 2: Data form
Build an HTML form that enables form users to add cards and add lists. You can use this form to test your API server.
