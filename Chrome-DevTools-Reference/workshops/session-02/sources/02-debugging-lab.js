const cartItems = [
    { sku: 'BK-101', name: 'Notebook', price: 120, quantity: 2 },
    { sku: 'PN-204', name: 'Pen Set', price: 80, quantity: 1 },
    { sku: 'BG-315', name: 'Canvas Bag', price: 450, quantity: 1 }
];

const orders = [
    { id: 501, customer: 'Asha', total: 1290, status: 'paid' },
    { id: 502, customer: 'Rahul', total: 640, status: 'failed' },
    { id: 503, customer: 'Meera', total: 2300, status: 'paid' },
    { id: 504, customer: 'Dev', total: 150, status: 'failed' }
];

const tasks = [
    { id: 101, title: 'Open Sources panel', done: true },
    { id: 102, title: 'Set a conditional breakpoint', done: false },
    { id: 103, title: 'Inspect a call stack', done: false }
];

const debugLabState = {
    cartItems,
    orders,
    tasks,
    lastAction: 'Page loaded'
};

window.debugLabState = debugLabState;

function runCartCalculation() {
    const result = calculateCartTotal(cartItems, 'SESSION2');
    debugLabState.lastAction = 'Calculated cart total';
    document.getElementById('cart-output').textContent =
        'Subtotal: ' + result.subtotal +
        '\nDiscount: ' + result.discount +
        '\nFinal total: ' + result.finalTotal;
}

function calculateCartTotal(items, couponCode) {
    const subtotal = items.reduce((sum, item) => {
        return sum + item.price * item.quantity;
    }, 0);
    const discount = getDiscount(subtotal, couponCode);
    const finalTotal = subtotal - discount;
    return { subtotal, discount, finalTotal };
}

function getDiscount(subtotal, couponCode) {
    if (couponCode === 'SESSION2' && subtotal > 500) {
        return Math.round(subtotal * 0.1);
    }
    return 0;
}

function resetCart() {
    debugLabState.lastAction = 'Reset cart output';
    document.getElementById('cart-output').textContent = 'Cart result will appear here.';
}

function processOrders() {
    const report = [];

    for (const order of orders) {
        const message = buildOrderMessage(order);
        report.push(message);
    }

    debugLabState.lastAction = 'Processed orders';
    document.getElementById('orders-output').textContent = report.join('\n');
}

function buildOrderMessage(order) {
    if (order.status === 'failed') {
        return 'Order ' + order.id + ' needs review for ' + order.customer;
    }
    return 'Order ' + order.id + ' is ready for fulfillment';
}

function createInvoice() {
    const invoice = buildInvoice('CUST-42', cartItems);
    debugLabState.lastAction = 'Created invoice';
    document.getElementById('invoice-output').textContent =
        invoice.invoiceNumber + ' created for ' + invoice.customerId +
        '\nAmount: ' + invoice.amount;
}

function buildInvoice(customerId, items) {
    const amount = calculateCartTotal(items, 'SESSION2').finalTotal;
    const invoiceNumber = formatInvoiceNumber(customerId, new Date());
    return { customerId, amount, invoiceNumber };
}

function formatInvoiceNumber(customerId, date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return 'INV-' + year + month + day + '-' + customerId;
}

function saveProfile() {
    try {
        const profile = readProfileForm();
        validateProfile(profile);
        debugLabState.lastAction = 'Saved profile';
        document.getElementById('profile-output').textContent =
            'Saved profile for ' + profile.name + ' as ' + profile.role;
    } catch (error) {
        debugLabState.lastAction = 'Profile validation failed';
        document.getElementById('profile-output').textContent = error.message;
    }
}

function readProfileForm() {
    return {
        name: document.getElementById('profile-name').value.trim(),
        role: document.getElementById('profile-role').value
    };
}

function validateProfile(profile) {
    if (!profile.name) {
        throw new Error('Name is required before saving a profile.');
    }
    if (!profile.role) {
        throw new Error('Role is required before saving a profile.');
    }
    return true;
}

document.getElementById('search-box').addEventListener('keydown', function handleSearchKeydown(event) {
    const currentValue = event.target.value;
    debugLabState.lastAction = 'Search key pressed: ' + event.key;
    document.getElementById('search-output').textContent =
        'Key: ' + event.key + '\nCurrent input value before update: ' + currentValue;
});

document.getElementById('keyboard-reset').addEventListener('click', function clearSearch() {
    document.getElementById('search-box').value = '';
    document.getElementById('search-output').textContent = 'Search cleared.';
});

async function loadRemoteTodo() {
    const output = document.getElementById('fetch-output');
    output.textContent = 'Loading remote todo...';
    debugLabState.lastAction = 'Started remote todo request';

    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
        const todo = await response.json();
        debugLabState.lastAction = 'Loaded remote todo';
        output.textContent = JSON.stringify(todo, null, 2);
    } catch (error) {
        debugLabState.lastAction = 'Remote todo request failed';
        output.textContent = 'Request failed: ' + error.message;
    }
}

function renderTasks() {
    const list = document.getElementById('task-list');
    const summary = document.getElementById('task-summary');
    list.innerHTML = '';

    for (const task of tasks) {
        const card = document.createElement('div');
        card.className = 'task-card';

        if (task.completed) {
            card.classList.add('done');
        }

        card.textContent = task.id + ': ' + task.title + ' - ' + (task.done ? 'Done' : 'Open');
        list.appendChild(card);
    }

    const completedCount = tasks.filter(task => task.done).length;
    debugLabState.lastAction = 'Rendered tasks';
    summary.textContent = completedCount + ' of ' + tasks.length + ' tasks are complete.';
}

function toggleTask(taskId) {
    const task = tasks.find(item => item.id === taskId);

    if (!task) {
        return;
    }

    task.done = !task.done;
    debugLabState.lastAction = 'Toggled task ' + taskId;
    renderTasks();
}

function exposeDebugState() {
    window.debugLabState = debugLabState;
    document.getElementById('snippet-output').textContent =
        'window.debugLabState is available. Try a Snippet with:\n' +
        'console.table(window.debugLabState.tasks);\n' +
        'window.debugLabState.tasks.filter(task => task.done).length;';
}

renderTasks();
