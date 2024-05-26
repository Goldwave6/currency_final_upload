
## Project Concept and Overview

Easy Exchange is a dynamic currency exchange website designed to facilitate the conversion of Swiss Francs to various foreign currencies. Featuring an elegant dark theme, the site offers a user-friendly interface that enhances navigability and overall user experience.

In addition to its core currency conversion functionality, Easy Exchange includes an historical chart. This feature provides users with a visual representation of how different currencies have trended over time in relation to the Swiss Franc, offering valuable insights into currency performance.

 ## Data Handling and Optimization

API and Database Interaction: When a chart API request is made, the system first checks if the required data is available in the database. If not, a PHP script makes an API call to fetch the data, which is then stored in the database. This prevents redundant API calls for the same data, reducing load times and improving user experience.

## User Interaction
PHP and JavaScript Integration

Dynamic Chart Creation: The historical and exchange rate charts are dynamically created using JavaScript. However, the data for these charts is fetched from the database via PHP scripts.
Data Integration Challenges: Initially integrating JavaScript with PHP to utilize database values for chart creation posed challenges. The integration process involved aligning PHP outputs with JavaScript to ensure seamless functionality and accurate data representation.

## Technical Challenges and Solutions
JavaScript Integration with PHP

Server-Side and Client-Side Scripting: Due to the need to embed PHP values directly within JavaScript for real-time data updates, the JavaScript code is included within the PHP files. Separating JavaScript into standalone files (scripts.js) resulted in difficulties in retrieving PHP-generated data, highlighting a unique integration challenge. Keeping JavaScript within PHP files ensures that data fetched by PHP can be directly used by JavaScript without interface issues, maintaining the responsiveness and accuracy of data-driven features like the exchange rate and historical charts.

API Integration Issues

Initial API Challenges: I initially intended to use an API listed in an Excel sheet (https://exchangeratesapi.io/), but it proved non-functional during development. This required a search for an alternative solution. After evaluating several options, I settled on using https://freecurrencyapi.com, which offered the necessary reliability and data accuracy for currency conversion and historical data. Testing and integrating this new API posed its own set of challenges but ultimately enhanced the project's data handling capabilities.


History Chart Challenge 

The history chart, which visualizes the historical performance of a currency selected by the user, initially only updated upon page reload. This was because the chart's data was sourced from PHP, a server-side language, necessitating a full page refresh to reflect changes.

Solution Attempt and Outcome
To enable dynamic updates without reloading the page, I implemented Ajax calls to fetch data from PHP asynchronously. This approach allowed for asynchronous data requests to the server, updating other features like exchange rates effectively. However, due to constraints related to the chart generation method used, this approach could not be directly applied to update the chart with new data on the fly.

Current Implementation
As a result, the history chart automaitcaly reloads the page after selecting the currency to update the chart data with new values. This ensures that users see the latest data, though it involves refreshing the entire page.

## Conclusion
Developing Easy Exchange was an enlightening experience, filled with both challenges and significant learning opportunities. Throughout the project, I enhanced my skills in data handling, server-client communication, and integrating PHP with JavaScript for dynamic web functionalities.

ChatGPT played a crucial role by providing timely advice and clarification on complex programming issues, which helped streamline the development process and improve the project’s structure. This project not only boosted my technical expertise but also deepened my appreciation for the practical application of web technologies in creating user-focused solutions.

## Used Resources 

- VS Code

- GithubCopilot

- ChatGPT 