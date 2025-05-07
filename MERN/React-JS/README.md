# React Learning Sequence

A structured path following the React course with key concepts, components, and mini-projects.

---

## 📦 01 - Components Creation and Usage

> **What:** Components are the building blocks of any React app. They let you split the UI into independent, reusable pieces.

- `src/01_Person.jsx`
- `src/01_Person2.jsx`
- `src/components/01_Test.jsx`
- `src/components/01_Test2.jsx`

---

## ♻️ 02 - Reusable Components

> **What:** Reusable components help you avoid code duplication and create a consistent UI by reusing logic/UI across the app.

- `src/components/02_Product.jsx`
- `src/components/02_Person3.jsx`

---

## 📩 03 - Props

> **What:** Props (short for properties) are used to pass data from parent to child components.

- `src/components/03_Product.jsx`

---

## ❓ 04 - Conditional Rendering (`&&` and Ternary Operator)

> **What:** Used to render elements or components conditionally using logical AND (`&&`) or the ternary (`? :`) operator.

- `src/components/04_Person4.jsx`

---

## 🎨 05 - CSS Integration

> **What:** Ways to apply styles in React: inline styles, CSS files, modules, or styled-components.

- `src/components/05_Laptop.jsx`

---

## 🖱️ 06 - Events

> **What:** Handle user interactions like clicks, form submissions, etc., using event handlers.

- `src/components/06_Events.jsx`

---

## 🧠 07 - `useState` Hook

> **What:** Allows functional components to manage state.

- `src/components/07_Counter.jsx`

---

## 🔁 08 - `map()` for Rendering Lists

> **What:** Use `map()` to dynamically render components from arrays.

- `src/components/08_ShowProduct.jsx`

---

## 🔍 09 - `filter()` for Searching/Filtering

> **What:** Use `filter()` to conditionally render items based on logic like search queries.

- `src/components/09_FilterProduct.jsx`

---

## 🎬 Project 1 - MovieZone

> **Mini-project to practice mapping, filtering, props, and state**

- `src/components/MovieZone`

---

## ⚙️ 10 - `useEffect` Hook

> **What:** Allows performing side effects like fetching data, timers, etc., in components.

- `src/components/10_FilterProduct.jsx`

---

## 🌐 11 - Fetching Data from API

> **What:** Use `fetch()` or Axios inside `useEffect()` to retrieve external data.

- `src/components/11_FilterProduct.jsx`

---

## 📝 12 - Form Handling

> **What:** Handling input fields and form submissions in React.

- `src/components/12_Form.jsx`

---

## 🧾 13 - Multiple Input Handling

> **What:** Manage multiple form fields using a single state object and `onChange` handler.

- `src/components/13_Multiple_Input_Handling.jsx`

---

## 🍜 Project 2 - Food Recipe (MealDB API)

> **Project to use API, filtering, search, and rendering**

- `src/components/MovieZone`

---

## 🚦 14 - React Router (v6+)

> **What:** Used to create Single Page Applications with multiple routes (pages).

### Static Routing Pages
- `src/pages/14_Home.jsx`
- `src/pages/14_About.jsx`
- `src/pages/14_Contact.jsx`
- `src/pages/14_Dashboard.jsx`
- `src/pages/14_Profile.jsx`
- `src/pages/14_Team.jsx`

---

## 🔗 15 - Dynamic Routing

> **What:** Routes based on dynamic data like ID, slug, etc.

- `src/pages/15_Course.jsx`
- `src/pages/15_Course_Detail.jsx`
- `src/pages/15_Course_Data.js`

### Links Example
- `src/pages/Home.jsx`

---

## 🧭 React Router Hooks

> **What:** Hooks like `useParams`, `useNavigate`, and `useLocation` provide access to route-related data and functions.

- `src/App.jsx`
- `src/pages/15_Course.jsx`
- `src/pages/15_Course_Detail.jsx`

---

## 🔄 Dynamic Navbar & Conditional Rendering

> **What:** Creating navigation links dynamically and conditionally rendering UI based on state/login, etc.

- `src/components/16_Navbar.jsx`

---

## 🧵 Props Drilling vs useContext Hook

### Props Drilling

> **What:** Passing data through many nested components, often leading to messy code.

- `src/components/Home/17_IndianGov.jsx`
- `src/components/Home/17_State.jsx`

### useContext Hook

> **What:** Solves props drilling by sharing data via context across multiple levels.

- `src/components/Home/18_District.jsx`
- `src/context/Home/18_MoneyContext.jsx`
- `src/components/Home/18_MoneyState.jsx`
- `src/main.jsx`

---

## 🖼️ Project 3 - PixaBay Clone

> **Project for practicing API fetch, filtering, search, routing, and state management**

- `pixabay-clone`

---

## 🗃️ React Redux Basics

> **What:** A predictable state container for JavaScript apps. Use `useSelector` to read and `useDispatch` to update store.

- `Redux`

---

## 📚 Resources

- 🎥 [React Full Course (YouTube)](https://www.youtube.com/watch?v=Qrsp4WY3axk&t=21014s)
- 📝 [Course Notes (Google Drive)](https://drive.google.com/file/d/1zlDGNFepSnKB5WYOY2N63MdP5L8-xsab/view?usp=drive_link)

---

> ✅ **Tip:** Follow the order for better understanding. Each topic builds upon the previous.

