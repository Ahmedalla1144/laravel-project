import { useToast } from "@/Hooks/Toast";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps } from "@/types";
import { useForm } from "@inertiajs/react";
import { title } from "process";

export default function AddProject({ auth }: PageProps) {
    const { showToast } = useToast();
    const { data, setData, processing, errors, post, reset } = useForm({
        title: "",
        description: "",
        source: "",
        visit: "",
        image: null as File | null,
        tags: "",
    });
    const handleImageChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        if (e.target.files) {
            setData("image", e.target.files[0]);
        }
    };
    const submit = (e: React.FormEvent) => {
        e.preventDefault();
        post(route("projects.store")),
            {
                onSuccess: () => {
                    showToast("Project added successfully", "success");
                    reset();
                },
                onError: () => {
                    showToast("Failed to add project", "error");
                },
            };
    };
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Add New Project
                </h2>
            }
        >
            <div className="py-12 flex justify-center items-center">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {/* Add project form */}
                    <form
                        onSubmit={submit}
                        className="flex flex-col gap-4 justify-center items-center w-full border p-10 rounded-xl border-slate-600"
                    >
                        <p className="text-gray-800 dark:text-gray-200 font-semibold border-b self-start text-xl">
                            Add Project
                        </p>
                        <label className="w-max">
                            <input
                                className="w-96 text-gray-800 dark:text-gray-200 border-none bg-white dark:bg-gray-800 "
                                type="text"
                                placeholder="Title"
                                name="title"
                                autoFocus
                                autoComplete="name"
                                onChange={(e) =>
                                    setData("title", e.target.value)
                                }
                            />
                            <p className="text-red-500 dark:text-red-400">
                                {errors.title && <div>{errors.title}</div>}
                            </p>
                        </label>
                        <label>
                            <input
                                className="w-96 text-gray-800 dark:text-gray-200 border-none bg-white dark:bg-gray-800 "
                                type="text"
                                placeholder="Description"
                                name="description"
                                onChange={(e) =>
                                    setData("description", e.target.value)
                                }
                            />
                            <p className="text-red-500 dark:text-red-400">
                                {errors.description && (
                                    <div>{errors.description}</div>
                                )}
                            </p>
                        </label>
                        <label>
                            <input
                                className="w-96 text-gray-800 dark:text-gray-200 border-none bg-white dark:bg-gray-800 "
                                type="text"
                                placeholder="Link for Source Code"
                                name="source"
                                onChange={(e) =>
                                    setData("source", e.target.value)
                                }
                            />
                            <p className="text-red-500 dark:text-red-400">
                                {errors.source && <div>{errors.source}</div>}
                            </p>
                        </label>
                        <label>
                            <input
                                className="w-96 text-gray-800 dark:text-gray-200 border-none bg-white dark:bg-gray-800 "
                                type="text"
                                placeholder="Link for Website"
                                name="visit"
                                onChange={(e) =>
                                    setData("visit", e.target.value)
                                }
                            />
                            <p className="text-red-500 dark:text-red-400">
                                {errors.visit && <div>{errors.visit}</div>}
                            </p>
                        </label>
                        <label className="">
                            <input
                                className="w-96 text-gray-800 dark:text-gray-200 border-none bg-white dark:bg-gray-800 "
                                type="file"
                                name="image"
                                onChange={handleImageChange}
                            />
                            <p className="text-red-500 dark:text-red-400">
                                {errors.image && <div>{errors.image}</div>}
                            </p>
                        </label>
                        <label className="flex flex-col w-max">
                            <input
                                className="w-96 text-gray-800 dark:text-gray-200 border-none bg-white dark:bg-gray-800 "
                                type="text"
                                placeholder="enter technologies"
                                name="tags"
                                onChange={(e) =>
                                    setData("tags", e.target.value)
                                }
                            />
                            <p className="text-red-500 dark:text-red-400">
                                {errors.tags && <div>{errors.tags}</div>}
                            </p>
                        </label>
                        <button
                            className="w-max text-white bg-slate-600 hover:bg-slate-700 py-3 px-6 rounded-md"
                            type="submit"
                            disabled={processing}
                        >
                            Add Project
                        </button>
                    </form>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
