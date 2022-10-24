# List Of Requirements

login - The login function let user login according to information from database.

logout - The login function let user logout.

sign up - The sign up function add user information to database.

Search - The search function get the matching information from the database according to the written Data.

Choose a quiz - The function that gets the stored information from the database and returns a set of questions with answers.

Choose an answer - The function that checks weather the chosen option is the right one by comparing it to the answer that is stored in the database.

# How the system should be and what it should not be?  
The system should be as simple as we can make it so that the user can easily use it, besides, it shouldn't be easily broken at any point by users actions, always working properly upon being opened in a browser. This means, that the system must be maintained by its creators and frequently tested during its development. It is important to mention that the code should be written in a readable fashion for the sole purpose of avoiding potential errors and making the developers work easier. The catched and reported errors during the maintenance phase will not confuse the working participants if the code is readable.

Data requirements must be accurate, reliable and true. When you make an action request such as finding, choosing, completing and checking, you should ensure that the input data matches the database data. When meeting the user's request, the system should ensure that it works in accordance to the expected accuracy and precision.

Time characteristics.
In order to meet the user's efficiency requirements, the response time of the data, the update processing time, the data conversion and transmission time, the running time should be within 1-5 seconds. When you need to interact with an external device, such as a printer, the response time may be longer, but it should be within acceptable limits.