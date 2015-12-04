class AssignmentController < ApplicationController
      layout "inner_layout"

	def index
	end

	def new
		@assignment=@current_instructor.assignments.new
	end

	def create
		if params[:assignment]
			params.permit!
			@assignment=@current_instructor.assignments.create(params[:assignment])
			if @assignment.save!
			redirect_to dashboard_instructor_index_path,:flash => { :success => "Created assignment" }
		end
	end
	end

	def show
	end

	def edit
		@assignment=@current_instructor.assignments.find(params[:id])
	end

	def update
		@assignment=@current_instructor.assignments.find(params[:id])
		if params[:assignment]
			params.permit!
		if @assignment.update(params[:assignment])
			redirect_to dashboard_instructor_index_path,:flash => { :success => "Edited assignment" }
		end
		end
	end

	def destroy
		assignment=@current_instructor.assignments.find(params[:id])
		assignment.destroy
    	flash[:alert]= "assignment was deleted"
    	redirect_to dashboard_instructor_index_path
	end

end
