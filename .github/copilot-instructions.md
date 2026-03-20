# SportsVibe - Instructions for GitHub Copilot

## Description
This file contains instructions for GitHub Copilot to assist in code generation and suggestions for the SportsVibe project. The instructions are designed to ensure that the generated code adheres to the project's coding standards and practices.

## The project
SportsVibe is a web application intended to manage sports organizations, including leagues, teams, players, and matches. 

The project is built using PHP 8.3 and CodeIgniter4 framework, following a modular monolithic architecture. 

The codebase is organized into modules, each responsible for a specific domain of the application (e.g., Organizations, Teams, Players). Each module contains its own controllers, models, views, and language files.

## General guidance for code generation.

### Folder structure
- [/app](../app) - Main application folder containing global configurations, libraries, and helpers, that are not related to a specific module.
- [/modules](../modules) - Contains all the functional modules of the application, each module has its own folder with its controllers, models, views, and language files.
- [/public](../public) - Publicly accessible folder containing assets like CSS, JavaScript, and images.
- [/tests](../tests) - Contains unit and integration tests for the application.
- [/writable](../writable) - Contains logs, cache, and other writable files.

## Links
- [List of issues](https://github.com/percontmx/sportsvibe/issues)
