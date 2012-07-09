function onBodyLoad() {
	//DONE//TODO: laadsysteem dat checked of alles geladen is
	
	//4
	postToBasecamp({action: 'get-my-id'}, function() {
		
		MY_USER_ID = this;
		LOADER += 1;
	});
	
	postToBasecamp({action: 'get-my-name'}, function() {
		
		MY_NAME = this;
		LOADER += 1;
	});
	
	postToBasecamp({action: 'get-leaderboard'}, function() {
		
		IJS_PEOPLE = this;
		LOADER += 1;
	});
	
	postToBasecamp({action: 'get-projects'}, function() {
		
		IJS_PROJECTS = this;
		LOADER += 1;
	});
}


//TODO: alle locale 'eigen server' variabelen toevoegen aan interface
function onClickEstimations() {
	
	if(MY_USER_ID !== ""){
		
		document.getElementById('container').innerHTML = IJS_PROJECTS;
	}
}

function onClickLeaderboard() {
	
	if(IJS_PEOPLE !== "") {
		
		document.getElementById('container').innerHTML = IJS_PEOPLE;
	}
}

function onClickProfile() {
	
	if(IJS_PROJECTS !== "") {
		
		document.getElementById('container').innerHTML = MY_USER_ID + MY_NAME;
	}
}
	
function onClickInfo(projectName, projectId) {
	var _bcTodoListArray = [],	//array filled with basecamp todo ids to compare with the ones on our local database
		_dbTodoListArray = [],	//array filled with local todo ids to compare with the ones on basecamp
		loader = function() {
			var count = 0;		//loader counts the number of callbacks from the main function and executes a comparison function if the count is done
			
			return function() {
				if(count === 2) {
					compareArrays(_bcTodoListArray, _dbTodoListArray, projectId);
					if(document.getElementById('project-name') !== null) {//TODO: geen null meer krijgen voor de project-name div
						document.getElementById('project-name').innerHTML = projectName;
					}
				}else {
					return (count +=1);
				}
			}
		},
		next = loader();
	
	//removes the css hover and starts the loading wheel
	$('#' + projectId).addClass('info-btn-active').removeClass('info-btn');
	
	postToBasecamp({action: 'get-todo-lists-array-for-project', projectid: projectId}, function() {
		_bcTodoListArray = this;
		next();
	});
	
	postToDatabase({action: 'get-todo-lists-from-database'}, function() {
		_dbTodoListArray = this;
		next();
	});
	
	postToBasecamp({action: 'get-todo-lists-for-project', projectid: projectId}, function() {
		document.getElementById('container').innerHTML = this;
		next();
	});
}

function createTodoList(projectId) {
	postToBasecamp({action: 'create-todo-list', projectid: projectId }, function() {
		document.getElementById('container').innerHTML = this;
		console.log(this);
	})
}

function compareArrays(basecamp, database, projectId) {// checks for new todo-lists in basecamp and inserts them in the database
	
	for (var i = 0; i<database.length; i++) {
		var arrlen = basecamp.length;
		for (var j = 0; j<arrlen; j++) {
			if (database[i] == basecamp[j]) {
				basecamp = basecamp.slice(0, j).concat(basecamp.slice(j+1, arrlen));
			}
		}
	}
	
	for(var i=0,j=basecamp.length; i<j; i++){
		postToDatabase({action: 'insert-new-todo-list', todolistid: basecamp[i], projectid: projectId});
	};
}

function onClickBack() {
	document.getElementById('container').innerHTML = IJS_PROJECTS;
}


function postToBasecamp(action, callback) {
	
	if(typeof callback == "undefined") {
		callback = null;
	}
	
	$.post('includes/basecamp-controller.php', {
			action_type: action.action,
			project_id: action.projectid,
			todo_list_id: action.todolistid,
			company_id: '1692667',//ijsfontein
			person_id: "9103088",
			date: '27-09-1988',
			hours: action.uren,
			description: action.description,
			name: action.name,
			token: action.token
			},
	function(data) {
		if(callback) {
			callback.call(data);
			
			if(LOADER == 4) {
				$("#container").show();
				$("#loading").hide();
			}
		}
	}, 'json')
}

function postToDatabase(action, callback) {
	
	if(typeof callback == "undefined") {
		callback = null;
	}
	
	$.post('includes/database-controller.php', {
			action_type: action.action,
			todo_list_id: action.todolistid,
			project_id: action.projectid,
			person_id: "9103088",
			name: action.name,
			token: action.token
			},
	function(data) {
		if(callback) {
			callback.call(data);
		}
	}, 'json')
}