import { useEffect, useState } from "react";
import axios from "axios";

const API_URL = "http://localhost:8080/products";

const App = () => {
  const [records, setRecords] = useState([]);
  const [formData, setFormData] = useState({ title: "", price: "" });
  const [editData, setEditData] = useState(null);
  const [isModalOpen, setIsModalOpen] = useState(false);

  useEffect(() => {
    fetchRecords();
  }, []);

  const fetchRecords = async () => {
    try {
      const response = await axios.get(API_URL);
      setRecords(response.data);
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!formData.title || !formData.price) return;
    try {
      await axios.post(API_URL, formData);
      setFormData({ title: "", price: "" });
      fetchRecords();
    } catch (error) {
      console.error("Error adding record:", error);
    }
  };

  const openEditModal = (record) => {
    setEditData(record);
    setIsModalOpen(true);
  };

  const handleUpdate = async (e) => {
    e.preventDefault();
    if (!editData.title || !editData.price) return;
    try {
      await axios.put(`${API_URL}/${editData.id}`, editData);
      setIsModalOpen(false);
      fetchRecords();
    } catch (error) {
      console.error("Error updating record:", error);
    }
  };

  const handleDelete = async (id) => {
    try {
      await axios.delete(`${API_URL}/${id}`);
      fetchRecords();
    } catch (error) {
      console.error("Error deleting record:", error);
    }
  };

  return (
    <div className="container mx-auto p-6 max-w-3xl">
      <h1 className="text-3xl font-bold text-center mb-6">Product Price</h1>
      <form onSubmit={handleSubmit} className="flex flex-col gap-4 mb-6">
        <input
          type="text"
          placeholder="Product Name"
          value={formData.title}
          onChange={(e) => setFormData({ ...formData, title: e.target.value })}
          className="border p-2 rounded-full"
        />
        <input
          type="text"
          placeholder="Price"
          value={formData.price}
          onChange={(e) => setFormData({ ...formData, price: e.target.value })}
          className="border p-2 rounded-full"
        />
        <button
          type="submit"
          className="bg-blue-500 text-white p-2 rounded-full hover:cursor-pointer"
        >
          Add
        </button>
      </form>
      <table className="w-full border rounded-lg overflow-hidden">
        <thead>
          <tr className="bg-gray-200">
            <th className="p-2">ID</th>
            <th className="p-2">Product Name</th>
            <th className="p-2">Price</th>
            <th className="p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          {records.map((record) => (
            <tr key={record.id} className="border-t">
              <td className="p-2 text-center">{record.id}</td>
              <td className="p-2 text-center">{record.title}</td>
              <td className="p-2 text-center">${record.price}</td>
              <td className="p-2 flex justify-center gap-2">
                <button
                  onClick={() => openEditModal(record)}
                  className="bg-yellow-500 text-white px-3 py-1 rounded-full hover:cursor-pointer"
                >
                  Edit
                </button>

                <button
                  onClick={() => handleDelete(record.id)}
                  className="bg-red-500 text-white px-3 py-1 rounded-full hover:cursor-pointer "
                >
                  Delete
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>

      {isModalOpen && (
        <div className="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
          <div className="bg-white p-6 rounded-lg w-80">
            <h2 className="text-xl font-bold mb-4">Edit Product</h2>
            <form onSubmit={handleUpdate} className="flex flex-col gap-4">
              <input
                type="text"
                value={editData.title}
                placeholder="Product Name"
                onChange={(e) =>
                  setEditData({ ...editData, title: e.target.value })
                }
                className="border p-2 rounded-full"
              />
              <input
                type="text"
                value={editData.price}
                placeholder="Price"
                onChange={(e) =>
                  setEditData({ ...editData, price: e.target.value })
                }
                className="border p-2 rounded-full"
              />
              <div className="flex justify-between">
                <button
                  type="submit"
                  className="bg-green-500 text-white px-4 py-1 rounded-full hover:cursor-pointer"
                >
                  Save
                </button>
                <button
                  onClick={() => setIsModalOpen(false)}
                  className="bg-gray-500 text-white px-4 py-1 rounded-full hover:cursor-pointer"
                >
                  Cancel
                </button>
              </div>
            </form>
          </div>
        </div>
      )}
    </div>
  );
};

export default App;

