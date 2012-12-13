codeigniter-mymodel-crud
========================

A simple class that handles common CRUD operations in a model, could be extended and improved.

- Copy MY_Model into your /application/core folder
- In your model files, extends MY_Model instead of CI_Model
- Call setTable() in the model constructor

example model :

    class Example extends MY_Model
    {
        function __construct()
        {
            parent::__construct();

            $this->setTable('example');
        }
    }

example Controller :

    class Example_controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();

            $this->load->model('example');
        }

        public function index()
        {
            $data = array('id' => null,
                          'field' => 'value');

            $this->example->add($data);
        }
    }