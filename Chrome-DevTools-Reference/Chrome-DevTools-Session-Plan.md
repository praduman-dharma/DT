# Chrome DevTools - Session Plan and Folder Suggestions

This file is prepared after reviewing the existing `Chrome-DevTools-Reference/` folder. The folder already contains documentation and demos for Elements, Console, Sources, Network, Coverage, Lighthouse, and Overrides. The plan below converts that material into multiple one-hour training sessions.

## Training Format

- Duration per session: 1 hour
- Recommended structure for each 1-hour session:
  - 5 minutes: session goal, recap, and setup
  - 15 minutes: concepts, use cases, and trainer-led explanation
  - 30 minutes: live demo and guided participant practice
  - 10 minutes: Q&A, recap, and next-step assignment

This timing works better than a simple 20/40 split because real sessions usually need a few minutes for setup, recap, questions, and transitions between demos.

---

# Plan A: Compact 3-Session Track

Use this plan when the audience already has basic web development knowledge or when you need to cover Chrome DevTools quickly in three one-hour sessions.

---

## Session 1: Chrome DevTools - DOM, CSS, Console, and UI Debugging

Foundation session focused on inspecting web pages, changing layout/styles live, understanding DOM behavior, and using the Console for faster frontend debugging.

### Session Overview

- DevTools orientation: opening DevTools, panel layout, shortcuts, command menu
- Elements Tab: inspecting DOM structure, selecting elements, editing HTML, modifying attributes
- CSS inspection: Styles, Computed styles, box model, toggling CSS rules, testing quick UI changes
- DOM search: text search, CSS selectors, XPath examples
- Event Listeners: finding attached events and understanding user interaction behavior
- DOM breakpoints: subtree modifications, attribute changes, node removal
- Console Tab: running JavaScript, reading logs, filtering messages, clearing and searching logs
- Console productivity: `$()`, `$$()`, `$0`, `copy()`, `monitorEvents()`, `debug()`
- Console logging patterns: `console.log`, `warn`, `error`, `table`, `group`, `time`, `trace`

### Suggested Time Split

- 5 minutes: Introduce DevTools, session goal, and demo files.
- 15 minutes: Explain Elements and Console workflows with common frontend debugging use cases.
- 30 minutes: Hands-on walkthrough using `demos/elements/dom-inspection.html` and `demos/console/console-demo.html`.
- 10 minutes: Q&A, recap, and small practice task.

### Practice Activity

Participants inspect a page, modify text and styling, locate event listeners, trigger a DOM breakpoint, and use Console utilities to query and inspect selected elements.

---

## Session 2: Chrome DevTools - JavaScript Debugging and Network Analysis

Intermediate session focused on debugging JavaScript execution, understanding runtime state, and investigating API/resource loading behavior.

### Session Overview

- Sources Tab layout: file navigator, code editor, debug sidebar
- Line breakpoints: setting, disabling, removing, and using breakpoints effectively
- Conditional breakpoints and logpoints for debugging loops and repeated function calls
- Stepping through code: step over, step into, step out, resume execution
- Inspecting state: Scope, Watch expressions, local variables, closures, and call stack
- Exception debugging: pause on caught and uncaught exceptions
- Event Listener and XHR/Fetch breakpoints for user actions and API calls
- Network Tab: recording requests, preserving logs, clearing requests
- Request details: Headers, Payload, Preview, Response, Timing, Initiator
- Filtering requests by type, status code, domain, size, and request category
- Network throttling, offline mode, and request blocking

### Suggested Time Split

- 5 minutes: Recap Session 1 and introduce debugging flow.
- 15 minutes: Explain breakpoints, runtime state, call stack, and network request investigation.
- 30 minutes: Hands-on walkthrough using `demos/sources/breakpoints.html` and `demos/network/xhr-fetch-demo.html`.
- 10 minutes: Q&A, recap, and debugging practice task.

### Practice Activity

Participants debug a JavaScript issue with breakpoints, inspect variable values, trace the call stack, find the API call behind a UI action, inspect the response, and test behavior under throttled network conditions.

---

## Session 3: Chrome DevTools - Performance, Coverage, Lighthouse, and Local Overrides

Advanced productivity session focused on measuring quality, identifying unused code, improving page performance, and testing local changes without deployment.

### Session Overview

- Coverage Panel: opening Coverage, recording page load and user interactions
- Understanding used vs unused CSS and JavaScript
- Reading coverage results: file size, unused bytes, percentage used, red and green source indicators
- Optimization discussion: dead code, large dependencies, lazy loading, code splitting, and CSS cleanup
- Lighthouse Panel: running mobile and desktop audits
- Lighthouse categories: Performance, Accessibility, Best Practices, SEO, PWA
- Core metrics: LCP, FCP, CLS, Speed Index, TTI, and interaction responsiveness
- Reading Lighthouse reports: opportunities, diagnostics, passed audits, and prioritizing fixes
- Overrides: setting up local overrides, editing CSS/JS/HTML, persisting changes across reloads
- API response mocking and testing UI fixes without deploying to a server

### Suggested Time Split

- 5 minutes: Recap previous debugging workflow and introduce optimization/testing workflow.
- 15 minutes: Explain Coverage, Lighthouse, and Overrides use cases.
- 30 minutes: Hands-on walkthrough using `demos/coverage/unused-css-js.html`, `demos/lighthouse/performance-demo.html`, and `demos/overrides/overrides-demo.html`.
- 10 minutes: Q&A, final recap, and improvement assignment.

### Practice Activity

Participants run Coverage, identify unused CSS/JS, run a Lighthouse audit, choose two actionable improvements, and use Overrides to test a visual or JavaScript change locally.

---

# Plan B: Full 5-Session Track

Use this plan when the audience has some web development experience and you want each major DevTools area to get enough practice time. This is the better format for a complete workshop series without stretching the basics too much.

---

## Session 1: DevTools Foundations, Elements Panel, and Console Panel

Foundation session focused on navigating DevTools, inspecting DOM/CSS, testing page changes live, and using the Console for quick JavaScript and debugging productivity.

### Session Overview

- Opening DevTools with shortcuts
- DevTools layout and panel navigation
- Command menu and useful shortcuts
- Elements Tab: DOM tree, selected element, breadcrumbs
- Inspecting and editing HTML
- Editing attributes and text content
- CSS Styles panel and Computed panel
- Box model, spacing, dimensions, and visual debugging
- DOM search using text, CSS selectors, and XPath
- Running JavaScript in page context
- Console message levels: log, info, warn, error
- Structured output: `console.table`, `console.group`, `console.groupEnd`
- Timing and tracing: `console.time`, `console.timeEnd`, `console.trace`
- Styling logs with `%c`
- Console filters and search
- Console utility functions: `$()`, `$$()`, `$0`, `$_`, `copy()`
- Event debugging with `monitorEvents()` and `unmonitorEvents()`
- Function debugging with `debug()` and `undebug()`

### Suggested Time Split

- 5 minutes: Session goal, setup, and DevTools orientation.
- 15 minutes: Explain Elements workflow, CSS inspection, and Console productivity use cases.
- 30 minutes: Live demo and guided practice using `demos/elements/dom-inspection.html` and `demos/console/console-demo.html`.
- 10 minutes: Q&A, recap, and combined DOM/CSS/Console practice task.

### Practice Activity

Participants inspect page structure, modify HTML/CSS, find elements using selectors, query DOM elements from the Console, inspect selected nodes, monitor events, and log structured data.

---

## Session 2: Sources Panel and JavaScript Debugging

Dedicated debugging session focused on breakpoints, stepping through JavaScript, and inspecting runtime state.

### Session Overview

- Sources Panel layout
- File navigator, editor, and debug sidebar
- Line breakpoints
- Conditional breakpoints
- Logpoints
- Step over, step into, step out, resume
- Scope, local variables, closure variables
- Watch expressions
- Call stack and stack frames
- Pause on exceptions
- Event Listener breakpoints
- XHR/Fetch breakpoints from the debugging perspective

### Suggested Time Split

- 5 minutes: Introduce the debugging problem and demo page.
- 15 minutes: Explain breakpoint types, stepping, scope, and call stack.
- 30 minutes: Live demo and guided practice using `demos/sources/breakpoints.html`.
- 10 minutes: Q&A, recap, and bug-finding exercise.

### Practice Activity

Participants pause code execution, inspect changing values, use a conditional breakpoint, add a logpoint, and trace the function call path.

---

## Session 3: Network Panel and API Debugging

Focused session on understanding resource loading, API calls, request/response details, and network conditions.

### Session Overview

- Recording network activity
- Preserve log and clear log
- Request table columns: Name, Status, Type, Initiator, Size, Time
- Headers, Payload, Preview, Response, Timing
- XHR and Fetch request debugging
- Filtering by type, status, domain, and size
- Advanced filters like `status-code:404`, `type:xhr`, `larger-than:1k`
- Network throttling and offline mode
- Request blocking
- Timing analysis and TTFB

### Suggested Time Split

- 5 minutes: Recap JavaScript debugging and connect it to API behavior.
- 15 minutes: Explain request lifecycle, filtering, and request detail tabs.
- 30 minutes: Live demo and guided practice using `demos/network/xhr-fetch-demo.html`.
- 10 minutes: Q&A, recap, and network investigation task.

### Practice Activity

Participants identify an API request, inspect headers and response data, filter failed requests, test throttling, and block a request.

---

## Session 4: Coverage and Lighthouse

Performance and quality session focused on measuring unused code, running audits, reading reports, and choosing practical improvements.

### Session Overview

- Opening and running Coverage
- Recording page load and user interactions
- Used vs unused CSS and JavaScript
- Reading coverage percentage and unused bytes
- What Coverage can and cannot prove
- Running Lighthouse audits
- Mobile vs Desktop audit choice
- Performance, Accessibility, Best Practices, SEO, PWA
- Core metrics: LCP, FCP, CLS, Speed Index, TTI
- Reading opportunities and diagnostics
- Prioritizing improvements from audit results

### Suggested Time Split

- 5 minutes: Introduce optimization and audit workflow.
- 15 minutes: Explain Coverage results and Lighthouse report structure.
- 30 minutes: Live demo and guided practice using `demos/coverage/unused-css-js.html` and `demos/lighthouse/performance-demo.html`.
- 10 minutes: Q&A, recap, and audit interpretation task.

### Practice Activity

Participants run Coverage, identify unused code, run Lighthouse, and select the top two fixes they would prioritize.

---

## Session 5: Overrides and Capstone Debugging Workflow

Final applied session focused on testing changes locally and combining multiple DevTools panels into one practical debugging workflow.

### Session Overview

- What Overrides are and when to use them
- Setting up an Overrides folder
- Browser permission flow
- Editing CSS, JavaScript, and HTML locally
- Persisting changes across reloads
- Mocking API responses
- Verifying that an override is active
- Disabling or removing overrides
- Capstone workflow:
  - Inspect UI in Elements
  - Query state in Console
  - Debug logic in Sources
  - Inspect API behavior in Network
  - Check quality/performance with Lighthouse or Coverage
  - Test a fix with Overrides

### Suggested Time Split

- 5 minutes: Recap all previous panels and introduce local testing workflow.
- 15 minutes: Explain Overrides setup, use cases, and safety notes.
- 30 minutes: Live demo and guided practice using `demos/overrides/overrides-demo.html` plus one combined debugging scenario.
- 10 minutes: Q&A, final recap, and recommended next steps.

### Practice Activity

Participants create an override, change page behavior locally, verify persistence after reload, and complete a small end-to-end debugging challenge.

---

## Suggested Additions for `Chrome-DevTools-Reference/`

The existing folder is already a strong reference and demo lab. These additions would make it easier to conduct structured sessions and reuse the material for workshops.

### 1. Add Session-Based Workshop Files

Add a `workshops/` folder with one file per session:

- `workshops/session-01-dom-console.md`
- `workshops/session-02-sources-network.md`
- `workshops/session-03-performance-overrides.md`

Each file can contain:

- Session goal
- Required demo files
- Step-by-step trainer script
- Participant exercises
- Expected outcomes
- Troubleshooting notes

### 2. Add Exercise Checklists

Add short checklists so participants can follow along during hands-on time:

- Inspect and modify one element
- Toggle CSS properties
- Find and test an event listener
- Add a breakpoint
- Inspect a network request
- Run a Lighthouse report
- Create and verify an override

### 3. Add Before-and-After Demo Tasks

For each demo, include a small challenge and expected result:

- Broken CSS layout to inspect and fix
- JavaScript bug to debug with Sources
- Slow request or large asset to inspect in Network
- Unused CSS/JS to identify with Coverage
- Lighthouse issue to diagnose and improve

### 4. Add a Trainer Notes File

Create `TRAINER_NOTES.md` with:

- Common questions and short answers
- Recommended order for live demos
- Timing guidance
- Backup explanations for beginners
- Known demo behavior and expected output

### 5. Add a Quick Reference Cheat Sheet

Create `CHEATSHEET.md` with:

- Keyboard shortcuts
- Console utility functions
- Common Network filters
- Breakpoint types
- Lighthouse metric targets
- Useful right-click actions in Elements and Sources

### 6. Add Troubleshooting Scenarios

Add a `troubleshooting/` folder with real-world debugging scenarios:

- Button click not working
- CSS rule not applying
- API returns 404 or 500
- Layout shift during load
- JavaScript error after user interaction
- Slow page load caused by large assets

### 7. Add Assessment or Recap Questions

Add short recap questions after each session:

- Which panel would you use for a CSS issue?
- How do you pause only when a variable has a specific value?
- How do you find the request sent by a button click?
- What does Coverage tell you and what does it not prove?
- When should Overrides be used?

### 8. Add Demo Launch Instructions

Add clear instructions for running demos locally:

- Whether files can be opened directly in Chrome
- Whether a local server is recommended
- Example command such as `npx serve` or `python3 -m http.server`
- Known browser permission steps for Overrides

### 9. Add Screenshots or Visual Guides

For training use, screenshots would help beginners recognize:

- Elements panel areas
- Console input and output
- Sources debugger sidebar
- Network request detail tabs
- Coverage result colors
- Lighthouse report sections
- Overrides folder setup

### 10. Add a Capstone Debugging Exercise

Create one final exercise that combines the major panels:

- Inspect a broken UI element in Elements
- Use Console to query state
- Use Sources to debug the click handler
- Use Network to inspect the API response
- Use Coverage or Lighthouse to identify an optimization
- Use Overrides to test a fix locally

This would make the reference folder useful not only as documentation, but also as a complete workshop kit.
