import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import Dropdown from "@/Components/Dropdown";
import { useState } from "react";
import { useToast } from "@/Hooks/Toast";

export default function Dashboard({ auth, projects }: PageProps) {
    const { showToast } = useToast();
    const { delete: deleteProject, processing } = useForm();
    const [showingProjectsMenu, setShowingProjectsMenu] = useState(false);
    const [projectId, setProjectId] = useState('');
    const titleprojects = projects.map(project => (
        <option key={project.id} value={project.id}>{project.title}</option>
    ));

    const handleDelete = (projectId: number) => {
        deleteProject(route("projects.destroy", projectId), {
            onSuccess: () => {
                showToast("Project deleted successfully!", "success");
            },
            onError: () => {
                showToast("Failed to delete project.", "error");
            },
        });
    };
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Dashboard
                </h2>
            }
        >
            <Head title="Dashboard" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            You're logged in!
                        </div>
                    </div>
                </div>
            </div>

            <div className="">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 dark:text-gray-100 cursor-pointer hover:text-gray-950 dark:hover:text-gray-400" onClick={() => setShowingProjectsMenu(!showingProjectsMenu)}>
                            Projects
                        </div>
                        {showingProjectsMenu && (
                            <div className="ml-10 pb-3 text-gray-900 dark:text-gray-100  flex flex-col gap-3">
                                <Link className="hover:text-gray-950 dark:hover:text-gray-400" href={route('projects.create')}>Create</Link>
                                <div className="flex flex-row justify-start items-center gap-5">
                                <Link className="hover:text-gray-950 dark:hover:text-gray-400"  href={projectId === '' ? route('dashboard') : route('projects.edit', [projectId]) }>Edit</Link>
                                <select onChange={(e) => setProjectId(e.target.value) } name="project" id="project" className="bg-white dark:bg-gray-800 border-none outline-none">
                                <option value="">Select a project</option>
                                    {titleprojects}
                                </select>
                                </div>
                                <div className="flex flex-row justify-start items-center gap-5">
                                <button className="hover:text-gray-950 dark:hover:text-gray-400" disabled={projectId === ''} onClick={() => handleDelete(parseInt(projectId))}>Delete</button>
                                <select onChange={(e) => setProjectId(e.target.value) } name="project" id="project" className="bg-white dark:bg-gray-800 border-none outline-none">
                                <option value="">Select a project</option>
                                    {titleprojects}
                                </select>
                                </div>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
