// Demo 1: Step Through Code
function stepThroughDemo() {
    console.log('Demo 1: Starting step through');
    const a = 10;
    const b = 20;
    const sum = a + b;  // Set breakpoint here
    console.log('Sum:', sum);
    document.getElementById('step-output').textContent = 'Sum = ' + sum;
}

// Demo 2: Conditional Breakpoint
function conditionalBreakpointDemo() {
    console.log('Demo 2: Starting conditional breakpoint');
    const limit = parseInt(document.getElementById('numbers-input').value) || 10;
    let total = 0;

    for (let i = 0; i < limit; i++) {  // Set conditional breakpoint: i === 5
        total += i;
        console.log('i =', i, 'total =', total);
    }

    document.getElementById('conditional-output').textContent = 'Final total: ' + total;
}

// Demo 3: Exception Handling
function testCaughtException() {
    try {
        console.log('About to throw caught exception');
        throw new Error('This is a caught error');
    } catch (e) {
        console.log('Caught exception:', e.message);
        document.getElementById('exception-output').textContent = 'Caught: ' + e.message;
    }
}

function testUncaughtException() {
    console.log('About to throw uncaught exception');
    // Uncomment next line to test uncaught exceptions
    // throw new Error('This is an uncaught error');
    document.getElementById('exception-output').innerHTML = 'Uncaught exception commented out (would crash page). Uncomment line in source to test.';
}

// Demo 4: Watch Expressions
function watchExpressionDemo() {
    console.log('Demo 4: Watch expressions');
    let count = 0;
    const userData = {
        name: 'Alice',
        age: 30,
        email: 'alice@example.com'
    };

    const data = userData;  // Set breakpoint, watch: userData.name, count, typeof data
    count++;

    console.log('User:', userData.name);
    document.getElementById('watch-output').textContent = 'User: ' + userData.name + ', Count: ' + count;
}

// Demo 5: Call Stack
function callStackDemo() {
    functionOne();
}

function functionOne() {
    console.log('In function one');
    functionTwo();
}

function functionTwo() {
    console.log('In function two');
    functionThree();
}

function functionThree() {
    console.log('In function three - set breakpoint here to see full call stack');
    // Set breakpoint here to see: functionThree → functionTwo → functionOne → callStackDemo
    document.getElementById('callstack-output').textContent = 'Check Call Stack pane in Sources panel for full hierarchy';
}

// Demo 6.1: Subtree Modification
function domChangeDemo() {
    const target = document.getElementById('mutation-target');
    target.textContent = 'Content modified!';
    target.style.background = 'lightgreen';
}

// Demo 6.2: Attribute Modification
function attributeChangeDemo() {
    const el = document.getElementById('attribute-target');
    el.classList.toggle('highlighted');
    el.textContent = 'Class changed to: ' + el.className;
}

// Demo 6.3: Node Removal
function nodeRemovalDemo() {
    const el = document.getElementById('removal-container');
    el.remove();
}

// Demo 7: Event Listener Breakpoint
document.getElementById('event-breakpoint-btn').addEventListener('click', function () {
    console.log('Event listener clicked');
    document.getElementById('event-output').textContent = 'Button clicked at ' + new Date().toLocaleTimeString();
});

// Demo 8: Debugger Statement
function debuggerDemo() {
    console.log('Before debugger statement');
    debugger;  // Execution pauses here
    console.log('After debugger statement');
    document.getElementById('debugger-output').textContent = 'Debugger statement executed';
}
