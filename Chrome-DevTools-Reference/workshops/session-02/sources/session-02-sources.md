# Sources Panel: JavaScript Debugging

The Sources panel is the main place to debug JavaScript in Chrome DevTools. It helps you pause code, step through logic, inspect runtime state, and understand why a page behaves the way it does.

---

## Table of Contents

1. [Session Goal](#session-goal)
2. [Demo File](#demo-file)
3. [Sources Panel Layout](#sources-panel-layout)
4. [Line Breakpoints](#line-breakpoints)
5. [Conditional Breakpoints](#conditional-breakpoints)
6. [Logpoints](#logpoints)
7. [Stepping Through Code](#stepping-through-code)
8. [Scope and Variables](#scope-and-variables)
9. [Watch Expressions](#watch-expressions)
10. [Call Stack](#call-stack)
11. [Pause on Exceptions](#pause-on-exceptions)
12. [Event Listener Breakpoints](#event-listener-breakpoints)
13. [XHR and Fetch Breakpoints](#xhr-and-fetch-breakpoints)
14. [Snippets](#snippets)
15. [Full Debugging Lab](#full-debugging-lab)
16. [Guided Practice](#guided-practice)
17. [Debugging Checklist](#debugging-checklist)

**Demo files:**
- [Breakpoint warm-up demo](01-breakpoints.html)
- [JavaScript debugging lab](02-debugging-lab.html)

---

## Session Goal

By the end of this session, participants should be able to:

- Open JavaScript source files in the Sources panel.
- Pause execution with line breakpoints.
- Use conditional breakpoints to pause only when a specific condition is true.
- Use logpoints to add temporary logging without editing code.
- Step over, step into, step out, and resume execution.
- Inspect local variables, closure variables, and global values.
- Add watch expressions for values they care about.
- Read the call stack and move between stack frames.
- Pause on caught or uncaught exceptions.
- Use event listener and XHR/fetch breakpoints to locate code paths.
- Create and run Sources snippets.
- Investigate a small real-world-style rendering bug.

---

## Demo Files

Start with the warm-up:

```text
Chrome-DevTools-Reference/workshops/session-02/sources/01-breakpoints.html
```

Then use the full lab:

```text
Chrome-DevTools-Reference/workshops/session-02/sources/02-debugging-lab.html
```

Recommended setup:

1. Open the demo file in Chrome.
2. Open DevTools.
3. Go to the **Sources** panel.
4. In the file navigator, open the active demo HTML file.
5. Keep the page visible so you can click demo buttons while DevTools is open.

The warm-up demo includes sections for:

- Step-through debugging.
- Conditional breakpoints.
- Caught and uncaught exceptions.
- Watch expressions.
- Call stack analysis.
- DOM mutation breakpoints.
- Event listener breakpoints.
- `debugger;` statements.

The debugging lab adds sections for:

- Runtime state and watch expressions.
- Logpoints on repeated data processing.
- Nested function call stack tracing.
- Form validation exceptions.
- Keyboard event listener breakpoints.
- XHR/fetch breakpoints.
- Sources snippets.
- A deliberate rendering bug investigation.

## Topic to Demo Map

| Topic | Use This Demo | Function or Section |
|---|---|---|
| First line breakpoint | `01-breakpoints.html` | `stepThroughDemo()` |
| Step over, step into, step out | `01-breakpoints.html` | Step Through Code |
| Conditional breakpoint | `01-breakpoints.html` | `conditionalBreakpointDemo()` |
| Runtime state | `02-debugging-lab.html` | `calculateCartTotal()` |
| Watch expressions | `02-debugging-lab.html` | Cart calculation |
| Logpoints | `02-debugging-lab.html` | `processOrders()` |
| Call stack | `02-debugging-lab.html` | `formatInvoiceNumber()` |
| Caught exceptions | `02-debugging-lab.html` | `validateProfile()` |
| Event listener breakpoint | `02-debugging-lab.html` | Search input `keydown` |
| XHR/fetch breakpoint | `02-debugging-lab.html` | `loadRemoteTodo()` |
| Snippets | `02-debugging-lab.html` | `window.debugLabState` |
| Bug investigation | `02-debugging-lab.html` | `renderTasks()` and `toggleTask()` |

---

## Sources Panel Layout

The Sources panel has three main areas.

| Area | What It Does |
|---|---|
| File navigator | Lists files loaded by the page. |
| Code editor | Shows source code and line numbers. |
| Debug sidebar | Shows breakpoints, scope, watch expressions, call stack, and event breakpoints. |

### Useful Navigation

| Action | Windows/Linux | macOS |
|---|---|---|
| Search current file | `Ctrl+F` | `Cmd+F` |
| Find in all files | `Ctrl+Shift+F` | `Cmd+Option+F` |
| Jump to line | `Ctrl+G` | `Ctrl+G` |
| Command Menu | `Ctrl+Shift+P` | `Cmd+Shift+P` |

### Trainer Note

Start by showing that the code in the Sources panel is the same JavaScript that runs when participants click buttons on the page. This makes the connection between UI action and source code immediate.

---

## Line Breakpoints

A line breakpoint pauses JavaScript when execution reaches a selected line.

### Set a Line Breakpoint

1. Open `01-breakpoints.html` in the Sources panel.
2. Find `stepThroughDemo()`.
3. Click the line number beside:

```javascript
const sum = a + b;
```

4. Click **Run Step Demo** on the page.
5. Execution pauses before the line runs.

### What to Inspect While Paused

- The highlighted line in the editor.
- The **Scope** pane for `a`, `b`, and `sum`.
- The **Call Stack** pane for the active function.
- The Console, which can evaluate variables while paused.

### Remove or Disable

- Click the blue breakpoint marker again to remove it.
- Right-click the breakpoint to disable, edit, or delete it.

---

## Conditional Breakpoints

A conditional breakpoint pauses only when an expression evaluates to true.

### Demo

1. Find `conditionalBreakpointDemo()`.
2. Right-click the line number for:

```javascript
for (let i = 0; i < limit; i++) {
```

3. Choose **Add conditional breakpoint**.
4. Enter:

```javascript
i === 5
```

5. Click **Run Conditional Demo**.

Execution pauses only when `i` is `5`.

### Useful Conditions

```javascript
i === 5
total > 20
limit >= 10
typeof limit !== 'number'
```

### When to Use

- Debug one loop iteration.
- Pause only for a specific user, item, status, or ID.
- Avoid stopping on every repeated function call.

---

## Logpoints

A logpoint writes a message to the Console without pausing execution and without changing the source file.

### Add a Logpoint

1. Right-click a line number.
2. Choose **Add logpoint**.
3. Enter a message:

```javascript
i=${i}, total=${total}, limit=${limit}
```

4. Run the demo.

The message appears in the Console every time the line executes.

### When to Use

- You need temporary logging.
- You do not want to edit the file.
- A normal breakpoint would pause too often.
- You want to observe values while letting the page continue.

---

## Stepping Through Code

When execution is paused, use the debug controls to move through code.

| Action | Shortcut | Meaning |
|---|---|---|
| Resume | `F8` | Continue until the next breakpoint or exception. |
| Step over | `F10` | Run the current line without entering called functions. |
| Step into | `F11` | Enter the function called on the current line. |
| Step out | `Shift+F11` | Finish the current function and return to the caller. |

### Practice

1. Set a breakpoint in `stepThroughDemo()`.
2. Click **Run Step Demo**.
3. Use `F10` to move line by line.
4. If you step into a helper or browser code by accident, use `Shift+F11` to step out.
5. Use `F8` to resume normal execution.

### Trainer Note

Explain stepping as a way to answer one question at a time: "What line runs next, and what changed after that line?"

---

## Scope and Variables

The **Scope** pane shows values available at the paused line.

Common sections:

- **Local**: variables inside the current function.
- **Closure**: variables captured from outer functions.
- **Global**: values available on `window`.

### Practice

1. Set a breakpoint inside `watchExpressionDemo()`.
2. Click **Run Watch Demo**.
3. Expand the **Local** scope.
4. Inspect:

```javascript
count
userData
data
```

5. Hover over the same variables in the code editor.

### Console While Paused

The Console can evaluate variables from the current paused scope:

```javascript
userData.name
count
Object.keys(userData)
```

---

## Watch Expressions

Watch expressions keep important values visible while stepping.

### Add Watch Expressions

1. Pause in `watchExpressionDemo()`.
2. Open the **Watch** section in the debug sidebar.
3. Click **+**.
4. Add:

```javascript
userData.name
count
typeof data
userData.email.includes('@')
```

5. Step through the function and watch the values update.

### Good Watch Expressions

- Important object properties.
- Boolean checks that explain a branch.
- Array lengths.
- Computed values that are hard to read quickly in the Scope pane.

---

## Call Stack

The call stack shows how execution reached the current line.

### Demo

1. Find `functionThree()`.
2. Set a breakpoint on the line that updates `callstack-output`.
3. Click **Run Call Stack Demo**.
4. Inspect the **Call Stack** pane.

Expected chain:

```text
functionThree
functionTwo
functionOne
callStackDemo
```

### Inspect Stack Frames

Click different frames in the Call Stack pane.

DevTools updates:

- The visible source location.
- The available scope values.
- The selected function context.

### When to Use

- A function was called from an unexpected place.
- You need to know which user action started the code path.
- A bug happens only after several nested function calls.

---

## Pause on Exceptions

Exception pausing helps catch errors at the line where they occur.

### Uncaught Exceptions

Uncaught exceptions are not handled by a `try...catch`.

To pause on them:

1. Open the **Breakpoints** section.
2. Enable **Pause on uncaught exceptions**.
3. Trigger the error.

### Caught Exceptions

Caught exceptions are handled by code, but they may still explain hidden failures.

To pause on them:

1. Enable **Pause on caught exceptions**.
2. Click **Test Caught Exception** in the demo.
3. DevTools pauses where the error is thrown.
4. Inspect the error object and call stack.

### Practice

Use the Console while paused:

```javascript
e.message
e.stack
```

For the uncaught exception demo, the throw line is intentionally commented out in the source so the page does not crash during normal practice. Participants can uncomment it temporarily in DevTools or use a separate local copy if they want to test uncaught exception behavior.

---

## Event Listener Breakpoints

Event listener breakpoints pause when a browser event fires, even if you do not know which function handles it.

### Demo

1. In the Sources panel, open **Event Listener Breakpoints**.
2. Expand **Mouse**.
3. Check **click**.
4. Click **Click me for event breakpoint** on the page.
5. DevTools pauses inside the click handler.

### What to Inspect

- The highlighted event handler.
- The event object.
- The call stack.
- The selected DOM element, if relevant.

### When to Use

- A button behaves incorrectly and you do not know the handler name.
- There are many event listeners on the page.
- You need to debug keyboard, mouse, form, animation, or clipboard events.

---

## XHR and Fetch Breakpoints

XHR/fetch breakpoints pause before a matching network request is sent.

This Sources session introduces the debugging side of API calls. Session 3 covers the Network panel in detail.

### Add an XHR/Fetch Breakpoint

1. In the debug sidebar, expand **XHR/fetch Breakpoints**.
2. Click **+**.
3. Enter part of a URL, such as:

```text
api
json
users
```

4. Trigger the UI action that sends the request.

### When to Use

- You know a request happens but do not know which code starts it.
- You need to inspect variables before a request is sent.
- You want to connect a UI action to API logic.

### Lab Demo

Use `02-debugging-lab.html` for this topic.

1. Add an XHR/fetch breakpoint for:

```text
todos
```

2. Click **Load Remote Todo**.
3. DevTools pauses before `fetch('https://jsonplaceholder.typicode.com/todos/1')` sends the request.
4. Inspect the current function, local variables, and call stack.
5. Resume execution.

If network access is unavailable, the request may fail after resume. The Sources skill is still visible because DevTools pauses before the matching request runs.

---

## Snippets

Snippets are reusable scripts stored and run from the Sources panel.

### Create a Snippet

1. Open the **Sources** panel.
2. Open the left sidebar.
3. Select **Snippets**.
4. Click **New snippet**.
5. Name it `session-02-task-summary`.
6. Paste:

```javascript
console.table(window.debugLabState.tasks);
window.debugLabState.tasks.filter(task => task.done).length;
```

7. Press `Ctrl+Enter` or right-click and choose **Run**.

### Lab Demo

1. Open `02-debugging-lab.html`.
2. Click **Expose Debug State**.
3. Run the snippet.
4. Toggle tasks and run the snippet again.

### When to Use

- Repeated inspection scripts.
- Debug helpers for a page you revisit often.
- Small experiments that are longer than a Console one-liner.

---

## Full Debugging Lab

Use `02-debugging-lab.html` after the breakpoint warm-up. It is designed to cover the rest of Session 2 with a more realistic debugging flow.

### Lab Sections

| Section | Topic | What to Practice |
|---|---|---|
| Runtime State and Watch Expressions | Scope and Watch | Pause in `calculateCartTotal()` and inspect computed values. |
| Conditional Breakpoints and Logpoints | Repeated code paths | Pause only when `order.status === 'failed'`, or log every order without pausing. |
| Call Stack and Nested Functions | Stack frames | Pause in `formatInvoiceNumber()` and trace back to `createInvoice()`. |
| Pause on Exceptions | Error debugging | Enable caught exceptions and inspect validation errors in `validateProfile()`. |
| Event Listener Breakpoints | Unknown handlers | Pause on `keydown` without manually finding the event listener first. |
| XHR/Fetch Breakpoints | API debugging from Sources | Pause before the `todos` request is sent. |
| Debugging a Small Bug | End-to-end investigation | Find why task cards do not visually match task completion state. |
| Snippet Practice | Reusable debug helpers | Use `window.debugLabState` from a Sources snippet. |

### Bug-Finding Scenario

The task summary says completed tasks exist, but the visual card state does not always match the data.

Investigation path:

1. Click **Render Tasks**.
2. Set a breakpoint inside `renderTasks()`.
3. Inspect each `task`.
4. Compare the property used for the displayed text with the property used for CSS state.
5. Click **Toggle Task 102**.
6. Step through `toggleTask()` and back into `renderTasks()`.

Hint:

```javascript
task.done
```

Expected finding:

```text
The task objects use task.done, but the card styling branch checks task.completed.
```

---

## Guided Practice

### Exercise 1: Pause and Step

1. Set a breakpoint in `stepThroughDemo()`.
2. Click **Run Step Demo**.
3. Step through the code with `F10`.
4. Confirm when `sum` becomes `30`.
5. Resume with `F8`.

Expected result:

```text
Sum = 30
```

### Exercise 2: Break Only on One Loop Iteration

1. Set a conditional breakpoint in `conditionalBreakpointDemo()`.
2. Use:

```javascript
i === 5
```

3. Set the input value to `10`.
4. Run the demo.
5. Inspect `i`, `total`, and `limit`.

Expected result:

```text
Execution pauses only when i is 5.
```

### Exercise 3: Add Temporary Logging

1. Replace the conditional breakpoint with a logpoint.
2. Use:

```javascript
i=${i}, total=${total}
```

3. Run the demo again.
4. Watch the Console output without pausing.

### Exercise 4: Inspect Runtime State

1. Set a breakpoint in `watchExpressionDemo()`.
2. Add watch expressions:

```javascript
userData.name
count
typeof data
```

3. Step through the function.
4. Observe when `count` changes.

### Exercise 5: Trace the Call Path

1. Set a breakpoint in `functionThree()`.
2. Click **Run Call Stack Demo**.
3. Click each call stack frame.
4. Explain which function called which.

### Exercise 6: Pause on a Click

1. Enable the `click` event listener breakpoint.
2. Click the event breakpoint button.
3. Inspect the paused event handler.
4. Resume execution.

### Exercise 7: Inspect Runtime State in the Lab

1. Open `02-debugging-lab.html`.
2. Set a breakpoint in `calculateCartTotal()`.
3. Click **Calculate Cart**.
4. Add watch expressions:

```javascript
subtotal
discount
finalTotal
couponCode === 'SESSION2'
```

5. Step into `getDiscount()`.
6. Step out and confirm the final total.

### Exercise 8: Use a Logpoint in the Lab

1. Add a logpoint inside `processOrders()`.
2. Use:

```javascript
Order ${order.id}: ${order.status}
```

3. Click **Process Orders**.
4. Confirm the Console logs each order without pausing.

### Exercise 9: Pause Before Fetch

1. Add an XHR/fetch breakpoint for:

```text
todos
```

2. Click **Load Remote Todo**.
3. Confirm DevTools pauses before the request is sent.
4. Resume execution and inspect the result or error output.

### Exercise 10: Run a Sources Snippet

1. Open `02-debugging-lab.html`.
2. Click **Expose Debug State**.
3. Create a Snippet named `session-02-task-summary`.
4. Run:

```javascript
console.table(window.debugLabState.tasks);
window.debugLabState.tasks.filter(task => task.done).length;
```

5. Toggle a task and run the snippet again.

### Exercise 11: Find the Rendering Bug

1. Set a breakpoint inside `renderTasks()`.
2. Click **Render Tasks**.
3. Inspect `task.done` and `task.completed`.
4. Identify why card styling does not match the data.

---

## Debugging Checklist

Use this order when debugging a JavaScript issue:

1. Reproduce the issue.
2. Find the likely function or event.
3. Set a breakpoint near the suspicious line.
4. Trigger the issue again.
5. Inspect Scope and Watch values.
6. Step line by line until the value changes incorrectly.
7. Read the Call Stack to understand how execution arrived there.
8. Use a conditional breakpoint if the code runs many times.
9. Use a logpoint if pausing interrupts the workflow.
10. Remove or disable breakpoints after the investigation.

---

## Recap Questions

1. When would you use a conditional breakpoint instead of a normal breakpoint?
2. What is the difference between Step Over and Step Into?
3. Where do you inspect local variables while paused?
4. What does the Call Stack tell you?
5. When is a logpoint better than editing `console.log()` into the file?
6. How can you pause on a click handler when you do not know the function name?
7. What is the value of a Sources snippet compared with a one-time Console command?
8. How can the Call Stack help you connect a button click to a lower-level helper function?

---

## Summary

The Sources panel helps you move from guessing to observing. Breakpoints stop the code at the right moment, stepping shows the execution path, Scope and Watch reveal current state, and the Call Stack explains how the code got there.

Use this session as the debugging foundation before moving into Network request analysis in Session 3.

---

## Related Docs

- [Session 1 Console notes](../../session-01/console/session-01-console.md)
- [Session 1 Elements notes](../../session-01/elements/session-01-elements.md)
- Source reference: `Chrome-DevTools-Reference/docs/03-sources.md`
